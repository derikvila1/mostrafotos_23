<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecursosController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function verificaAccessToken($token)
    {
        $retorno = DB::connection('mostra_fotografia_2023')->table('accesse_token')->where('accessToken', $token)->first();

        $data = date("Y-m-d H:i:s", strtotime($retorno->created_at . " +1 hours"));

        if (strtotime($data) < strtotime(Date('Y-m-d H:i:s'))) {
            return redirect('recurso/login');
        }
        return 'true';
    }

    public function acesso()
    {

        session()->forget('UserName');
        session()->forget('acesse_token');
        session()->forget('cpf');
        session()->forget('uuidInscricao');
        session()->forget('sessionStart');


        return view('recursos.loginRecurso');
    }

    public function validacao(Request $request)
    {
        // gerete token
        $numero_de_bytes = 4;
        $restultado_bytes = random_bytes($numero_de_bytes);
        $resultado_final = bin2hex($restultado_bytes);
        $acesseToken = md5($resultado_final);

        $pass = md5($request->password);

        $pf = DB::connection('mostra_fotografia_2023')->table('inscricao')->where('pfCpf', $request->document)->where('chave', $pass)->count();
        if ($pf > 0) {
            $pf = DB::connection('mostra_fotografia_2023')->table('inscricao')->where('pfCpf', $request->document)->where('chave', $pass)->first();

            session(['UserName' => $pf->pfNome]);
            session(['acesse_token' =>         $acesseToken]);
            session(['uuidInscricao' => 'value']);
            session(['sessionStart' => Date('Y-m-d H:i:s')]);
            $dados = ([
                'uuidInscricao' => $pf->uuid,
                'accessToken' => $acesseToken,
                'validade' => 1,
                'created_at' => Date('Y-m-d h:i:s'),
                'updated_at' => Date('Y-m-d h:i:s'),
            ]);
            DB::connection('mostra_fotografia_2023')->table('accesse_token')->insert($dados);

            return  redirect('/recurso/projetos');
        } else {
            $pj = DB::connection('mostra_fotografia_2023')->table('inscricao')->where('pjCpf', $request->document)->where('chave', $pass)->count();



            if ($pj > 0) {

                $pj = DB::connection('mostra_fotografia_2023')->table('inscricao')->where('pjCpf', $request->document)->where('chave', $pass)->first();

                session(['UserName' => $pj->pjNome]);
                session(['acesse_token' =>         $acesseToken]);
                session(['cpf' =>   $request->document]);
                session(['uuidInscricao' => 'value']);
                session(['sessionStart' => Date('Y-m-d H:i:s')]);
                $dados = ([
                    'uuidInscricao' => $pj->uuid,
                    'accessToken' => $acesseToken,
                    'validade' => 1,
                    'created_at' => Date('Y-m-d h:i:s'),
                    'updated_at' => Date('Y-m-d h:i:s'),
                ]);
                DB::connection('mostra_fotografia_2023')->table('accesse_token')->insert($dados);
                return  redirect('/recurso/projetos');
            } else {
                return  redirect()->back()->withErrors('CPF ou Senha invalidos');
            }
        }
    }


    public function projetos(Request $request)
    {
        if ($request->session()->exists('acesse_token')) {

            $token = session('acesse_token');

            $retorno = DB::connection('mostra_fotografia_2023')->table('accesse_token')->where('accessToken', $token)->first();

            $data = date("Y-m-d H:i:s", strtotime($retorno->created_at . " +1 hours"));

            if (strtotime($data) < strtotime(Date('Y-m-d H:i:s'))) {
                return redirect('recurso/login')->withErrors('Sua sessão expirou');
            }

            $value = session('cpf');
            $dados = DB::connection('mostra_fotografia_2023')->table('inscricao as i')
                // ->join('mostra_fotografia_2023.habilitacao_i as hi', 'hi.uuidInscricao', '=', 'i.uuid')
                ->where('i.pjCpf', $value)->orWhere('i.pfCpf', $value)->get();

            return view('recursos.projetos', compact('dados'));
        } else {
            return redirect('recurso/login');
        }
    }

    public function projetosVisualizar($uuid)
    {
        if (session()->exists('acesse_token')) {

            $token = session('acesse_token');

            $retorno = DB::connection('mostra_fotografia_2023')->table('accesse_token')->where('accessToken', $token)->first();

            $data = date("Y-m-d H:i:s", strtotime($retorno->created_at . " +1 hours"));

            if (strtotime($data) < strtotime(Date('Y-m-d H:i:s'))) {
                return redirect('recurso/login')->withErrors('Sua sessão expirou');
            }



            $value = session('cpf');
            $dados = DB::connection('mostra_fotografia_2023')->table('inscricao')->where('uuid', $uuid)->first();
            $proposta =  DB::connection('mostra_fotografia_2023')->table('proposta')->where('uuidInscricao', $uuid)->first();
            $historico =  DB::connection('mostra_fotografia_2023')->table('historico')->where('uuidInscricao', $uuid)->get();
            $habilitacaoI =  DB::connection('mostra_fotografia_2023')->table('habilitacao_i')->where('uuidInscricao', $uuid)->first();
            $documentos = [];

            $doc = storage_path('app/documentacao/' . $uuid);
            if (is_dir($doc)) {
                $documentos = scandir($doc);
            }
            return view('recursos.projetosVisualizarRecurso', compact('dados', 'documentos', 'proposta', 'historico', 'habilitacaoI'));
        } else {
            return redirect('recurso/login');
        }
    }

    public function upload(Request $request)
    {


        if (session()->exists('acesse_token')) {
            $token = session('acesse_token');

            $retorno = DB::connection('mostra_fotografia_2023')->table('accesse_token')->where('accessToken', $token)->first();

            $data = date("Y-m-d H:i:s", strtotime($retorno->created_at . " +1 hours"));

            if (strtotime($data) < strtotime(Date('Y-m-d H:i:s'))) {
                return redirect('recurso/login')->withErrors('Sua sessão expirou');
            }

            if ($request['certidaoNegativa'] != null) {
                $nome = 'certidaoNegativa.' . $request['certidaoNegativa']->extension();
                $request->file('certidaoNegativa')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['rg'] != null) {
                $nome = 'rg.' . $request['rg']->extension();
                $request->file('rg')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['cpf'] != null) {
                $nome = 'cpf.' . $request['cpf']->extension();
                $request->file('cpf')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['regularidadeFederal'] != null) {
                $nome = 'regularidadeFederal.' . $request['regularidadeFederal']->extension();
                $request->file('regularidadeFederal')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['regularidadeEstadual'] != null) {
                $nome = 'regularidadeEstadual.' . $request['regularidadeEstadual']->extension();
                $request->file('regularidadeEstadual')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['regularidadeMunicipal'] != null) {
                $nome = 'regularidadeMunicipal.' . $request['regularidadeMunicipal']->extension();
                $request->file('regularidadeMunicipal')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['fgts'] != null) {
                $nome = 'fgts.' . $request['fgts']->extension();
                $request->file('fgts')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['representacao'] != null) {
                $nome = 'representacao.' . $request['representacao']->extension();
                $request->file('representacao')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['trabalhista'] != null) {
                $nome = 'trabalhista.' . $request['trabalhista']->extension();
                $request->file('trabalhista')->storeAs('documentacao/' . $request->uuid, $nome);
            }

            if ($request['falencia'] != null) {
                $nome = 'falencia.' . $request['falencia']->extension();
                $request->file('falencia')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['contratoSocial'] != null) {
                $nome = 'contratoSocial.' . $request['contratoSocial']->extension();
                $request->file('contratoSocial')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['cadastroNacional'] != null) {
                $nome = 'cadastroNacional.' . $request['cadastroNacional']->extension();
                $request->file('cadastroNacional')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['comprovanteResidencia'] != null) {
                $nome = 'comprovanteResidencia.' . $request['comprovanteResidencia']->extension();
                $request->file('comprovanteResidencia')->storeAs('documentacao/' . $request->uuid, $nome);
            }

            if ($request['cartao'] != null) {
                $nome = 'cartao.' . $request['cartao']->extension();
                $request->file('cartao')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['ficha'] != null) {
                $nome = 'ficha.' . $request['ficha']->extension();
                $request->file('ficha')->storeAs('documentacao/' . $request->uuid, $nome);
            }

            if ($request['copia'] != null) {
                $nome = 'copia.' . $request['copia']->extension();
                $request->file('copia')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['anexos'] != null) {
                $nome = 'anexos.' . $request['anexos']->extension();
                $request->file('anexos')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['liberacao'] != null) {
                $nome = 'liberacao.' . $request['liberacao']->extension();
                $request->file('liberacao')->storeAs('documentacao/' . $request->uuid, $nome);
            }
            if ($request['autorizacao'] != null) {
                $nome = 'autorizacao.' . $request['autorizacao']->extension();
                $request->file('autorizacao')->storeAs('documentacao/' . $request->uuid, $nome);
            }

            return redirect()->back()->with('msg', 'arquivo anexado');
        } else {
            return redirect('recurso/login');
        }
    }
    public function save(Request $request)
    {


        if (session()->exists('acesse_token')) {
            $token = session('acesse_token');

            $retorno = DB::connection('mostra_fotografia_2023')->table('accesse_token')->where('accessToken', $token)->first();

            $data = date("Y-m-d H:i:s", strtotime($retorno->created_at . " +1 hours"));

            if (strtotime($data) < strtotime(Date('Y-m-d H:i:s'))) {
                return redirect('recurso/login')->withErrors('Sua sessão expirou');
            }

            $validated = $request->validate([
                'motivo' =>  ['required'],
                'justificativa' =>  ['required'],
            ]);
            $dados = ([
                'uuidInscricao' => $request->uuid,
                'motivo' => $request->motivo,
                'justificativa' => $request->justificativa,
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => Date('Y-m-d H:i:s'),
            ]);

            $array = ([
                'dados' => $dados,   
            ]);
            $historico = ([
                'uuidAutor' => $request->uuid,
                'uuidInscricao' => $request->uuid,
                'log' => 'inscrição',
                'dodos' => json_encode($array),
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => Date('Y-m-d H:i:s'),
            ]);

            try {
                DB::connection('mostra_fotografia_2023')->table('historico')->insert($historico);
                DB::connection('mostra_fotografia_2023')->table('recurso_avaliacao')->insert($dados);
                DB::commit();
                if ($request['recurso'] != null) {
                    $nome = 'recurso.' . $request['recurso']->extension();
                    $request->file('recurso')->storeAs('documentacao/' . $request->uuid, $nome);
                }
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors('Erro contate o suporte'.$e);
            }
           

          
            

            return redirect()->back()->with('msg', 'arquivo anexado');
        } else {
            return redirect('recurso/login');
        }
    }


    public function logoff()
    {

        session()->forget('UserName');
        session()->forget('acesse_token');
        session()->forget('cpf');
        session()->forget('uuidInscricao');
        session()->forget('sessionStart');
        return redirect('recurso/login');
    }
}
