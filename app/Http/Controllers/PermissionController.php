<?php

namespace App\Http\Controllers;

use App\Models\GrantedPermission;
use App\Models\Application;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }
        //serve SSO
        $permissions = Application::join('permissions', 'applications.id', '=', 'permissions.application')->paginate(100);
        //localhost AND SSO2
        //$grants = GrantedPermission::select(DB::raw('permission, count(*) as grants'))->groupBy('permission')->get();
        //return $grants;
        return view('dashboard.permissions', compact('permissions'));
    }

    // Verifica se o usuário possui permissão
    public static function checkPermission($permission)
    {
        $user = auth()->user()->uuid;
        if (GrantedPermission::where('user', $user)->where('permission', $permission)->first()) {
            return true;
        } else {
            return false;
        }
    }

    // Adiciona uma nova permissão ao usuário atual
    public static function grantPermission($permission)
    {
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }
        $user = auth()->user()->uuid;
        if (!GrantedPermission::where('user', $user)->where('permission', $permission)->first()) {
            GrantedPermission::insert(
                [
                    'user' => $user,
                    'permission' => $permission,
                    'grant_date' => now(),
                    'granted_by' => $user,
                ]
            );
        }
    }

    // Adiciona uma nova permissão ao usuário designado
    public static function grantPermissionToUser($permission, $user)
    {
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }
        if (!GrantedPermission::where('user', $user)->where('permission', $permission)->first()) {
            GrantedPermission::insert(
                [
                    'user' => $user,
                    'permission' => $permission,
                    'grant_date' => now(),
                    'granted_by' => auth()->user()->uuid,
                ]
            );
        }
    }
}
