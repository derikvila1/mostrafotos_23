<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvaliacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function avaliacaoI()
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
    public function avaliacaoISave(Request $request)
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
            'a_nota' => $request->a_nota,
            'a_observacao' => $request->a_observacao,
            'b_nota' => $request->b_nota,
            'b_observacao' => $request->b_observacao,
            'c_nota' => $request->c_nota,
            'c_observacao' => $request->c_observacao,
            'd_nota' => $request->d_nota,
            'd_observacao' => $request->d_observacao,
            'e_nota' => $request->e_nota,
            'e_observacao' => $request->e_observacao,
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
            'log' => 'avaliacao I',
            'dodos' => json_encode($array),
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);

        $buscar =  DB::connection('mostra_fotografia_2023')->table('avaliacao_i')
        ->where('uuidAvalidaro', $uuid)
        ->where( 'uuidInscricao' , $request->id)
        ->count();

        DB::beginTransaction();

        try {
            DB::connection('mostra_fotografia_2023')->table('historico')->insert($historico);
            if($buscar == 0){
                DB::connection('mostra_fotografia_2023')->table('avaliacao_i')->insert($dados);
            }else{
            DB::connection('mostra_fotografia_2023')->table('avaliacao_i')
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

    public function avaliacaoIISave(Request $request)
    {
        $userid = auth()->user()->id;
        $uuid = auth()->user()->id;
        $nome = auth()->user()->name;

        //  $checkpermission = DB::table('permitted_users')->select('permission')
        //     ->where('user', $userid)
        //     ->whereBetween('permission', [801, 810])
        //     ->get()->first();
        // if ($checkpermission == null) {
        //     abort(403);
        // }
        $dados = ([
            'uuidInscricao' => $request->id,
            'a_nota' => $request->a_nota,
            'a_observacao' => $request->a_observacao,
            'b_nota' => $request->b_nota,
            'b_observacao' => $request->b_observacao,
            'c_nota' => $request->c_nota,
            'c_observacao' => $request->c_observacao,
            'd_nota' => $request->d_nota,
            'd_observacao' => $request->d_observacao,
            'e_nota' => $request->e_nota,
            'e_observacao' => $request->e_observacao,
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
            'log' => 'avaliacao II',
            'dodos' => json_encode($array),
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);

        $buscar =  DB::connection('mostra_fotografia_2023')->table('avaliacao_ii')
        ->where('uuidAvalidaro', $uuid)
        ->where( 'uuidInscricao' , $request->id)
        ->count();

        DB::beginTransaction();

        try {
            DB::connection('mostra_fotografia_2023')->table('historico')->insert($historico);
            if($buscar == 0){
                DB::connection('mostra_fotografia_2023')->table('avaliacao_ii')->insert($dados);
            }else{
            DB::connection('mostra_fotografia_2023')->table('avaliacao_ii')
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

    public function avaliacaoIIISave(Request $request)
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
            'a_nota' => $request->a_nota,
            'a_observacao' => $request->a_observacao,
            'b_nota' => $request->b_nota,
            'b_observacao' => $request->b_observacao,
            'c_nota' => $request->c_nota,
            'c_observacao' => $request->c_observacao,
            'd_nota' => $request->d_nota,
            'd_observacao' => $request->d_observacao,
            'e_nota' => $request->e_nota,
            'e_observacao' => $request->e_observacao,
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
            'log' => 'avaliacao III',
            'dodos' => json_encode($array),
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);

        $buscar =  DB::connection('mostra_fotografia_2023')->table('avaliacao_iii')
        ->where('uuidAvalidaro', $uuid)
        ->where( 'uuidInscricao' , $request->id)
        ->count();

        DB::beginTransaction();

        try {
            DB::connection('mostra_fotografia_2023')->table('historico')->insert($historico);
            if($buscar == 0){
                DB::connection('mostra_fotografia_2023')->table('avaliacao_iii')->insert($dados);
            }else{
            DB::connection('mostra_fotografia_2023')->table('avaliacao_iii')
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

     public function avaliacaoIVSave(Request $request)
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
            'a_nota' => $request->a_nota,
            'a_observacao' => $request->a_observacao,
            'b_nota' => $request->b_nota,
            'b_observacao' => $request->b_observacao,
            'c_nota' => $request->c_nota,
            'c_observacao' => $request->c_observacao,
            'd_nota' => $request->d_nota,
            'd_observacao' => $request->d_observacao,
            'e_nota' => $request->e_nota,
            'e_observacao' => $request->e_observacao,
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
            'log' => 'avaliacao IV',
            'dodos' => json_encode($array),
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);

        $buscar =  DB::connection('mostra_fotografia_2023')->table('avaliacao_iv')
        ->where('uuidAvalidaro', $uuid)
        ->where( 'uuidInscricao' , $request->id)
        ->count();

        DB::beginTransaction();

        try {
            DB::connection('mostra_fotografia_2023')->table('historico')->insert($historico);
            if($buscar == 0){
                DB::connection('mostra_fotografia_2023')->table('avaliacao_iv')->insert($dados);
            }else{
            DB::connection('mostra_fotografia_2023')->table('avaliacao_iv')
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
    public function avaliacaoInaorealizada()
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



    public function avaliacaoII()
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

    public function avaliacaoIInaorealizada()
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


    public function avaliacaoIII()
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

    public function avaliacaoIIInaorealizada()
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


    public function avaliacaoIV()
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

    public function avaliacaoIVnaorealizada()
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


}
