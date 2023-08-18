<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\GrantedPermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }
        if ($request->search and $request->type == 'name'){
            $users = User::select('id', 'uuid', 'name', 'document')->where('name', 'LIKE', '%' . $request->search .'%')->paginate(100);
        }
        else if ($request->search and $request->type == 'document'){
            $users = User::select('id', 'uuid', 'name', 'document')->where('document', 'LIKE', '%' . $request->search .'%')->paginate(100);
        }
        else{
            $users = User::select('id', 'uuid', 'name', 'document')->paginate(100);
        }
        $message = session()->get('message');
        return view("dashboard.users", compact('message', 'users'));
    }

    public function create()
    {
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }
        $message = session()->get('message');
        $permissoes = Application::join('permissions', 'applications.id', '=', 'permissions.application')->get();
        return view("dashboard.users_create", compact('message', 'permissoes'));
    }

    public function store(Request $request)
    {
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'document' => 'required|max:14',
            'password' => 'required|min:8|max:32',
            'password_confirm' => 'required|min:8|max:32',
        ]);

        if (User::where('document', $request->document)->first()) {
            return back()->withErrors('Já existe um usuário com o documento fornecido');
        }

        if ($request->password != $request->password_confirm) {
            return back()->withErrors('Confirmação de senha incorreta');
        }

        $user = User::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'document' => $request->document,
            'password' => bcrypt($request->password),
            'created_by' => auth()->user()->uuid,
        ]);

        if ($request->permissions != null) {
            foreach($request->permissions as $permission){
                PermissionController::GrantPermissionToUser($permission, $user->uuid);
            }
        }

        session()->flash('message', "Usuário cadastrado com sucesso.");
        return redirect('/users');
    }
    
    public function show(Request $request)
    {
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }

        $request->validate([
            'uuid' => 'required|max:36',
        ]);

        $user = User::where('uuid', $request->uuid)->first();
        $user_permissions = GrantedPermission::join('permissions', 'granted_permissions.permission', '=', 'permissions.id')->join('applications', 'permissions.application', '=', 'applications.id')->join('users', 'users.uuid', '=', 'granted_by')->select('applications.name AS application', 'permissions.id', 'permissions.description AS permission', 'users.name AS granted_by', 'grant_date')->where('user', $user->uuid)->get();
        $permissions = Application::join('permissions', 'applications.id', '=', 'permissions.application')->get();
        $message = session()->get('message');
        return view("dashboard.users_show", compact('message', 'user', 'user_permissions', 'permissions'));
    }

    public function update(Request $request)
    {
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }

        $request->validate([
            'uuid' => 'required|max:36',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'document' => 'required|max:14',
        ]);

        if ($request->document != User::where('uuid', $request->uuid)->first()->document) {
            if (User::where('document', $request->document)->first()) {
                return back()->withErrors('Já existe um usuário com o documento fornecido');
            }
        }

        if ($request->password && $request->password_confirm) {
            $request->validate([
                'password' => 'min:8|max:32',
                'password_confirm' => 'min:8|max:32',
            ]);
        }

        if ($request->password != $request->password_confirm) {
            return back()->withErrors('Confirmação de senha incorreta');
        }

        if ($request->password && $request->password_confirm) {
            User::where('uuid', $request->uuid)->update([
                'name' => $request->name,
                'email' => $request->email,
                'document' => $request->document,
                'password' => bcrypt($request->password),
            ]);
        }

        else {
            User::where('uuid', $request->uuid)->update([
                'name' => $request->name,
                'email' => $request->email,
                'document' => $request->document,
            ]);
        }


        session()->flash('message', "Cadastro de usuário alterado com sucesso.");
        return back();
    }

    public function permission_store(Request $request) {
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }
        foreach($request->permissions as $permission){
            PermissionController::GrantPermissionToUser($permission, $request->uuid);
        }
        session()->flash('message', "Permissão adicionada com sucesso.");
        return back();
    }

    public function permission_delete(Request $request){
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }

        GrantedPermission::where('permission', $request->permission)->where('user', $request->uuid)->delete();
        session()->flash('message', "Permissão removida com sucesso.");
        return back();
    }

    public function delete(Request $request)
    {
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }
        GrantedPermission::where('user', $request->uuid)->delete();
        User::where('uuid', $request->uuid)->delete();
        session()->flash('message', "Usuário removido com sucesso.");
        return redirect('/users');
    }
}
