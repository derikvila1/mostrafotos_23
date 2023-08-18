<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class habilitacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function habilitados()
    {
        $userid = auth()->user()->id;

        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [801, 810])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }

        if (isset($_GET['search'])) {

            $search = $_GET['search'];

            $search = '%' . $search . '%';

            $inscricao =  DB::connection('mostra_fotografia_2023')->table('inscricao')->where('id', 'like', $search)->paginate(10);

        } else {

            $inscricao =  DB::connection('mostra_fotografia_2023')->table('inscricao')->paginate(10);

        }

        return view("dashboard.inscricao", compact('inscricao'));
    }

    public function naohabilitados()
    {

        $userid = auth()->user()->id;

         $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [801, 810])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        
        if (isset($_GET['search'])) {

            $search = $_GET['search'];

            $search = '%' . $search . '%';

            $inscricao =  DB::connection('mostra_fotografia_2023')->table('inscricao')->where('id', 'like', $search)->paginate(10);
        } else {

            $inscricao =  DB::connection('mostra_fotografia_2023')->table('inscricao')->paginate(10);

        }

        return view("dashboard.inscricao", compact('inscricao'));

    }

    //  HABILITADOR I

    public function habilitacaoI()
    {

        $userid = auth()->user()->id;

         $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [801, 810])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }

        if (isset($_GET['search'])) {

            $search = $_GET['search'];

            $search = '%' . $search . '%';

            $inscricao =  DB::connection('mostra_fotografia_2023')->table('inscricao')->where('id', 'like', $search)->paginate(10);

        } else {
            
            $inscricao =  DB::connection('mostra_fotografia_2023')->table('inscricao')->paginate(10);
            
        }

        return view("dashboard.inscricao", compact('inscricao'));

    }
    public function habilitacaoISave(Request $request)
    {

        $userid = auth()->user()->id;
        $uuid = auth()->user()->id;
        $nome = auth()->user()->name;

         $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [801, 810])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        $dados = ([
            'uuidInscricao' => $request->id,
            'avaliacao' => $request->habilitacao,
            'observacao' => $request->observacao_habilitacao,
            'uuidAvalidaro' => $uuid,
            'nomeAvaliador' => $nome,
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);
        $array = ([
            'dados' => $dados,
        ]);
        $historico = ([
            'uuidAutor' => $uuid,
            'uuidInscricao' => $request->id,
            'log' => 'habilitacao I',
            'dodos' => json_encode($array),
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);

        $buscar =  DB::connection('mostra_fotografia_2023')->table('habilitacao_i')
        ->where('uuidAvalidaro', $uuid)
        ->where( 'uuidInscricao' , $request->id)
        ->count();

        DB::beginTransaction();

        try {
            DB::connection('mostra_fotografia_2023')->table('historico')->insert($historico);
            if($buscar == 0){
                DB::connection('mostra_fotografia_2023')->table('habilitacao_i')->insert($dados);
            }else{
            DB::connection('mostra_fotografia_2023')->table('habilitacao_i')
            ->where('uuidAvalidaro', $uuid)
            ->where( 'uuidInscricao' , $request->id)
            ->update($dados);

            }
            DB::commit();
            // return 'Dados inseridos com Sucesso';
            return redirect("/panel/inscritos/visualizar/" . $request->id );
        } catch (\Exception $e) {
            DB::rollback();
            // return redirect()->back()->withErrors(json_encode($e));
            return redirect()->back()->withErrors('Erro contate o suporte, ' .json_encode($e));
        }

    }

    //  HABILITADOR II

    public function habilitacaoII()
    {

        $userid = auth()->user()->id;

         $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [801, 810])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }

        if (isset($_GET['search'])) {

            $search = $_GET['search'];

            $search = '%' . $search . '%';

            $inscricao =  DB::connection('mostra_fotografia_2023')->table('inscricao')->where('id', 'like', $search)->paginate(10);

        } else {

            $inscricao =  DB::connection('mostra_fotografia_2023')->table('inscricao')->paginate(10);

        }

        return view("dashboard.inscricao", compact('inscricao'));
    }

    public function habilitacaoIISave(Request $request)
    {

        $userid = auth()->user()->id;
        $uuid = auth()->user()->id;
        $nome = auth()->user()->name;

        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [801, 810])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        $dados = ([
            'uuidInscricao' => $request->id,
            'avaliacao' => $request->habilitacao,
            'observacao' => $request->observacao_habilitacao,
            'uuidAvalidaro' => $uuid,
            'nomeAvaliador' => $nome,
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);
        $array = ([
            'dados' => $dados,
        ]);
        $historico = ([
            'uuidAutor' => $uuid,
            'uuidInscricao' => $request->id,
            'log' => 'habilitacao II',
            'dodos' => json_encode($array),
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);

        $buscar =  DB::connection('mostra_fotografia_2023')->table('habilitacao_ii')
        ->where('uuidAvalidaro', $uuid)
        ->where( 'uuidInscricao' , $request->id)
        ->count();

        DB::beginTransaction();

        try {
            DB::connection('mostra_fotografia_2023')->table('historico')->insert($historico);
            if($buscar == 0){
                DB::connection('mostra_fotografia_2023')->table('habilitacao_ii')->insert($dados);
            }else{
            DB::connection('mostra_fotografia_2023')->table('habilitacao_ii')
            ->where('uuidAvalidaro', $uuid)
            ->where( 'uuidInscricao' , $request->id)
            ->update($dados);

            }
            DB::commit();
            // return 'Dados inseridos com Sucesso';
            return redirect("/panel/inscritos/visualizar/" . $request->id );
        } catch (\Exception $e) {
            DB::rollback();
            // return redirect()->back()->withErrors(json_encode($e));
            return redirect()->back()->withErrors('Erro contate o suporte, ' .json_encode($e));
        }

    }
    //  HABILITADOR III

    public function habilitacaoIII()
    {

        $userid = auth()->user()->id;
        
         $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [801, 810])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }

        if (isset($_GET['search'])) {

            $search = $_GET['search'];

            $search = '%' . $search . '%';

            $inscricao =  DB::connection('mostra_fotografia_2023')->table('inscricao')->where('id', 'like', $search)->paginate(10);
            
        } else {

            $inscricao =  DB::connection('mostra_fotografia_2023')->table('inscricao')->paginate(10);

        }

        return view("dashboard.inscricao", compact('inscricao'));
    }

    public function habilitacaoIIISave(Request $request)
    {

        $userid = auth()->user()->id;
        $uuid = auth()->user()->id;
        $nome = auth()->user()->name;

         $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [801, 810])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        $dados = ([
            'uuidInscricao' => $request->id,
            'avaliacao' => $request->habilitacao,
            'observacao' => $request->observacao_habilitacao,
            'uuidAvalidaro' => $uuid,
            'nomeAvaliador' => $nome,
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);
        $array = ([
            'dados' => $dados,
        ]);
        $historico = ([
            'uuidAutor' => $uuid,
            'uuidInscricao' => $request->id,
            'log' => 'habilitacao III',
            'dodos' => json_encode($array),
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);

        $buscar =  DB::connection('mostra_fotografia_2023')->table('habilitacao_iii')
        ->where('uuidAvalidaro', $uuid)
        ->where( 'uuidInscricao' , $request->id)
        ->count();

        DB::beginTransaction();

        try {
            DB::connection('mostra_fotografia_2023')->table('historico')->insert($historico);
            if($buscar == 0){
                DB::connection('mostra_fotografia_2023')->table('habilitacao_iii')->insert($dados);
            }else{
            DB::connection('mostra_fotografia_2023')->table('habilitacao_iii')
            ->where('uuidAvalidaro', $uuid)
            ->where( 'uuidInscricao' , $request->id)
            ->update($dados);

            }
            DB::commit();
            // return 'Dados inseridos com Sucesso';
            return redirect("/panel/inscritos/visualizar/" . $request->id );
        } catch (\Exception $e) {
            DB::rollback();
            // return redirect()->back()->withErrors(json_encode($e));
            return redirect()->back()->withErrors('Erro contate o suporte, ' .json_encode($e));
        }

    }
}
