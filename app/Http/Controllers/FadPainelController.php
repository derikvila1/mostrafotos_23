<?php
/*
observaçõa
comemntar checkpermissão no localhost para facilita observaçãpo da paginas.
não subir o comit com esse trecho comentado

*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FadPainelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $inscricao =  DB::connection('mostra_fotografia_2023')->table('inscricao')->count();

        return view("dashboard.index", compact('inscricao'));
    }

    public function inscricao()
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
        for ($i = 0; $i < 10; $i++) {
            if (isset($inscricao[$i])) {
                $habI =  DB::connection('mostra_fotografia_2023')->table('habilitacao_i')->get();
                $habII =  DB::connection('mostra_fotografia_2023')->table('habilitacao_ii')->get();
                $habIII =  DB::connection('mostra_fotografia_2023')->table('habilitacao_ii')->get();
                // $avI =  DB::connection('mostra_fotografia_2023')->table('avaliacao_i')->get();
                // $avII =  DB::connection('mostra_fotografia_2023')->table('avaliacao_ii')->get();
                // $avIII =  DB::connection('mostra_fotografia_2023')->table('avaliacao_iii')->get();
                // $avVI =  DB::connection('mostra_fotografia_2023')->table('avaliacao_iv')->get();
                $inscricao[$i]->habI = $habI;
                $inscricao[$i]->habII = $habII;
                $inscricao[$i]->habIII = $habIII;
                // $inscricao[$i]->avI = $avI;
                // $inscricao[$i]->avII = $avII;
                // $inscricao[$i]->avIII = $avIII;
                // $inscricao[$i]->avVI = $avVI;
            }
        }



        return view("dashboard.inscricao", compact('inscricao'));
    }

    public function inscritosVisualizar($uuid)
    {
        $minhasPermissoes  = [];
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [801, 810])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }

        $minhasPermissoes = DB::table('permitted_users')->select('permission')
        ->where('user', $userid)
        ->whereBetween('permission', [801, 810])
        ->select('permission')
        ->get();
        $inscricao =  DB::connection('mostra_fotografia_2023')->table('inscricao')->where('uuid', $uuid)->first();
        $proposta =  DB::connection('mostra_fotografia_2023')->table('proposta')->where('uuidInscricao', $uuid)->first();
        $historico =  DB::connection('mostra_fotografia_2023')->table('historico')->where('uuidInscricao', $uuid)->get();
        $habilitacaoI =  DB::connection('mostra_fotografia_2023')->table('habilitacao_i')->where('uuidInscricao', $uuid)->first();
        $habilitacaoII =  DB::connection('mostra_fotografia_2023')->table('habilitacao_ii')->where('uuidInscricao', $uuid)->first();
        $habilitacaoIII =  DB::connection('mostra_fotografia_2023')->table('habilitacao_iii')->where('uuidInscricao', $uuid)->first();
        $avI =  DB::connection('mostra_fotografia_2023')->table('avaliacao_i')->where('uuidInscricao', $uuid)->first();
        $avII =  DB::connection('mostra_fotografia_2023')->table('avaliacao_ii')->where('uuidInscricao', $uuid)->first();
        $avIII =  DB::connection('mostra_fotografia_2023')->table('avaliacao_iii')->where('uuidInscricao', $uuid)->first();
        $avIV =  DB::connection('mostra_fotografia_2023')->table('avaliacao_iv')->where('uuidInscricao', $uuid)->first();
        $documentos = [];

        $doc = storage_path('app/documentacao/' . $uuid);
        if (is_dir($doc)) {
            $documentos = scandir($doc);
        }

      
        return view("dashboard.inscricao_visualizar", compact('inscricao', 'proposta', 'historico', 'documentos', 'habilitacaoI', 'habilitacaoII', 'habilitacaoIII', 'minhasPermissoes','avI','avII','avIII','avIV'));
    }

    public function inscritosVisualizarSave(Request $request)
    {
        $userid = auth()->user()->id;

        $proposta = ([
            // 'espetaculo' => $request['espetaculo'],
            // 'artista' => $request['artista'],
            'categoria' => $request['categoria'],
            // 'tempo' => $request['tempo'],
            // 'classificacao' => $request['classificacao'],
            // 'sinopse' => $request['sinopse'],     
            // 'historia' => $request['historia'],
            // 'linkPortifolio' => $request['link-portifolio'],
            // 'linkCurriculo' => $request['link-curriculo'],
            // 'linkFotos' => $request['link-fotos'],
            // 'linkVideo' => $request['link-video'],
        ]);

        $array = ([
            'proposta' => $proposta,
        ]);
        $historico = ([
            'uuidAutor' => $userid,
            'uuidInscricao' => $request->uuid,
            'log' => 'Alterção solicitada pelo proponente',
            'dodos' => json_encode($array),
            'created_at' => Date('Y-m-d h:i:s'),
            'updated_at' => Date('Y-m-d h:i:s'),
        ]);
        DB::beginTransaction();
        try {
            // DB::connection('mostra_fotografia_2023')->table('historico')->insert($historico);
            // DB::connection('mostra_fotografia_2023')->table('proposta')->where('uuidInscricao',$request->uuid)->update($proposta);
            // DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors('Erro contate o suporte' . $e);
        }
    }

    public function arquivo($id, $arquivo)
    {

        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [801, 810])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        $doc = storage_path('/app/documentacao/' . $id . '/' . $arquivo);
        $download = $doc;

        if (file_exists($download)) {
            return response()->download($download);
        } else {
            return 'Arquivo não encontrado';
        }
    }
}
