<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PDF;

class PublicController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function inscricao()
    {
        return view('pages.form');
    }

    public function inscricaoSave(Request $request)
    {
        $contador = '';
        // dd($request['upload-anexos']);
        if ($request['pjCpf'] != null) {
            $contador = DB::connection('mostra_fotografia_2023')->table('inscricao')->where('pfCpf', $request['pjCpf'])->orWhere('pjCpf', $request['pjCpf'])->count();
        }
        if ($request['pfCpf'] != null) {
            $contador = DB::connection('mostra_fotografia_2023')->table('inscricao')->where('pjCpf', $request['pfCpf'])->orWhere('pfCpf', $request['pfCpf'])->count();
        }
        // dd($request->tipo);

        if ($contador >= 1000) {
            return redirect()->back()->withErrors('Limite de propostas cadastradas');
        }
        // dd($request->files);
        $numero_de_bytes = 4;
        $restultado_bytes = random_bytes($numero_de_bytes);
        $resultado_final = bin2hex($restultado_bytes);
        $uuid = str::uuid();

        $chave =  md5($resultado_final);
        $proposta = ([
            'uuidInscricao' => $uuid,
           
            'created_at' => Date('Y-m-d h:i:s'),
            'updated_at' => Date('Y-m-d h:i:s'),

        ]);

        if ($request->tipo == 'pj') {


            $validated = $request->validate([
                'pj-upload-rg' =>  ['required', 'mimes:pdf,png,jpeg,jpg', 'max:3072'],
                'pj-upload-cpf' =>  ['required', 'mimes:pdf,png,jpeg,jpg', 'max:3072'],
               
                'pj-upload-representacao' =>  ['required', 'mimes:pdf,png,jpeg,jpg', 'max:3072'],
        
                'pj-upload-contratoSocial' =>  ['required', 'mimes:pdf,png,jpeg,jpg', 'max:3072'],
                'pj-upload-cadastroNacional' =>  ['required', 'mimes:pdf,png,jpeg,jpg', 'max:3072'],

                'upload-comprovanteResidencia' =>  ['required', 'mimes:pdf,png,jpeg,jpg', 'max:3072'],
                'ficha' =>  ['required', 'mimes:pdf,png,jpeg,jpg', 'max:3072'],
                'copia' =>  ['required', 'mimes:pdf,png,jpeg,jpg', 'max:3072'],

                'espetaculo' => 'required',
                'artista' => 'required',
                'categoria' => 'required',
                'classificacao' => 'required',
                'sinopse' => 'required',
                'historia' => 'required',
                'link-portifolio' => 'required',
                'link-curriculo' => 'required',
                'link-fotos' => 'required',
                'link-video' => 'required',
                'tipo' => 'required',
                'pj-nome' => 'required',
                'pjCpf' => ['required', 'numeric'],
                'pj-rg' => ['required', 'numeric'],
                'cep' => 'required',
                'endereco' => 'required',
                'bairro' => 'required',
                'municipio' => 'required',
                'uf' => 'required',
                'fone1' => ['required', 'numeric'],
                'email' => 'required',
              
            ]);
            $dados = ([
                'uuid' => $uuid,
                'chave' => $chave,
                'tipo' => $request['tipo'],
                'pjNome' => $request['pj-nome'],
                'pjCpf' => $request['pjCpf'],
                'pjRg' => $request['pj-rg'],

                'cep' => $request['cep'],
                'endereco' => $request['endereco'],
                'bairro' => $request['bairro'],
                'municipio' => $request['municipio'],
                'uf' => $request['uf'],
                'fone1' => $request['fone1'],
                'fone2' => $request['fone2'],
                'email' => $request['email'],
        
                'log' => 'inscrição',
                'created_at' => Date('Y-m-d h:i:s'),
                'updated_at' => Date('Y-m-d h:i:s'),
            ]);
        } else if ($request->tipo == 'pf') {

            $validated = $request->validate([
                'pf-upload-rg' =>  ['required', 'mimes:pdf,png,jpeg,jpg', 'max:3072'],
                'pf-upload-cpf' =>  ['required', 'mimes:pdf,png,jpeg,jpg', 'max:3072'],
                'upload-comprovanteResidencia' =>  ['required', 'mimes:pdf,png,jpeg,jpg', 'max:3072'],
                'tipo' => 'required',
                
                'pf-nacionalidade' => 'required',
                'pf-nascimento' => 'required',
                'pfCpf' => ['required', 'numeric'],
                'pf-rg' => ['required', 'numeric'],
                'cep' => ['required', 'numeric'],
                'endereco' => 'required',
                'bairro' => 'required',
                'municipio' => 'required',
                'uf' => 'required',
                'fone1' => ['required', 'numeric'],
                'email' => 'required',
                'upload-foto1' => ['required', 'mimes:jpg,jpeg', 'max:4096'],
                'upload-foto2' => ['mimes:jpg,jpeg', 'max:4096'],
                'upload-foto3' => ['mimes:jpg,jpeg', 'max:4096'],
                'upload-foto4' => ['mimes:jpg,jpeg', 'max:4096'],


            ]);
            $dados = ([
                'uuid' => $uuid,
                'chave' => $chave,
                'tipo' => $request['tipo'],
                'pfNome' => $request['pf-nome'],
                'pfNomeArtistico' => $request['pf-nomeArtistico'],
                'pfNomeSocial' => $request['pf-nomeSocial'],
                'pfEstadoCivil' => $request['pf-estadoCivil'],
                'pfNacionalidade' => $request['pf-nacionalidade'],
                'pfNascimento' => $request['pf-nascimento'],
                'pfCpf' => $request['pfCpf'],
                'pfRg' => $request['pf-rg'],

                'cep' => $request['cep'],
                'endereco' => $request['endereco'],
                'bairro' => $request['bairro'],
                'municipio' => $request['municipio'],
                'uf' => $request['uf'],
                'fone1' => $request['fone1'],
                'fone2' => $request['fone2'],
                'email' => $request['email'],

                'titulofoto1' => $request['titulofoto1'],
                'titulofoto2' => $request['titulofoto2'],
                'titulofoto3' => $request['titulofoto3'],
                'titulofoto4' => $request['titulofoto4'],

                'distincao-foto1' => $request['distincao-foto1'],
                'distincao-foto2' => $request['distincao-foto2'],
                'distincao-foto3' => $request['distincao-foto3'],
                'distincao-foto4' => $request['distincao-foto4'],

   
                'log' => 'inscrição',

                'created_at' => Date('Y-m-d h:i:s'),
                'updated_at' => Date('Y-m-d h:i:s'),
            ]);
        }
        $array = ([
            'proposta' => $proposta,
            'dados' => $dados,


        ]);
        $historico = ([
            'uuidAutor' => $uuid,
            'uuidInscricao' => $uuid,
            'log' => 'inscrição',
            'dodos' => json_encode($array),
            'created_at' => Date('Y-m-d h:i:s'),
            'updated_at' => Date('Y-m-d h:i:s'),
        ]);


        // DB::table('historico')->insert($historico);
        // DB::table('proposta')->insert($proposta);
        // DB::table('inscricao')->insert($dados);

        DB::beginTransaction();

        try {
            DB::connection('mostra_fotografia_2023')->table('historico')->insert($historico);
            DB::connection('mostra_fotografia_2023')->table('proposta')->insert($proposta);
            DB::connection('mostra_fotografia_2023')->table('inscricao')->insert($dados);
            DB::commit();
            // return 'Dados inseridos com Sucesso';

            if ($request->tipo == 'pj') {

                if ($request['pj-upload-certidaoNegativa'] != null) {
                    $nome = 'certidaoNegativa.' . $request['pj-upload-certidaoNegativa']->extension();
                    $request->file('pj-upload-certidaoNegativa')->storeAs('documentacao/' . $uuid, $nome);
                }
                if ($request['pj-upload-rg'] != null) {
                    $nome = 'rg.' . $request['pj-upload-rg']->extension();
                    $request->file('pj-upload-rg')->storeAs('documentacao/' . $uuid, $nome);
                }
                if ($request['pj-upload-cpf'] != null) {
                    $nome = 'cpf.' . $request['pj-upload-cpf']->extension();
                    $request->file('pj-upload-cpf')->storeAs('documentacao/' . $uuid, $nome);
                }
                if ($request['pj-upload-regularidadeFederal'] != null) {
                    $nome = 'regularidadeFederal.' . $request['pj-upload-regularidadeFederal']->extension();
                    $request->file('pj-upload-regularidadeFederal')->storeAs('documentacao/' . $uuid, $nome);
                }
                if ($request['pj-upload-regularidadeEstadual'] != null) {
                    $nome = 'regularidadeEstadual.' . $request['pj-upload-regularidadeEstadual']->extension();
                    $request->file('pj-upload-regularidadeEstadual')->storeAs('documentacao/' . $uuid, $nome);
                }
                if ($request['pj-upload-regularidadeMunicipal'] != null) {
                    $nome = 'regularidadeMunicipal.' . $request['pj-upload-regularidadeMunicipal']->extension();
                    $request->file('pj-upload-regularidadeMunicipal')->storeAs('documentacao/' . $uuid, $nome);
                }
                if ($request['pj-upload-fgts'] != null) {
                    $nome = 'fgts.' . $request['pj-upload-fgts']->extension();
                    $request->file('pj-upload-fgts')->storeAs('documentacao/' . $uuid, $nome);
                }
                if ($request['pj-upload-representacao'] != null) {
                    $nome = 'representacao.' . $request['pj-upload-representacao']->extension();
                    $request->file('pj-upload-representacao')->storeAs('documentacao/' . $uuid, $nome);
                }
                if ($request['pj-upload-trabalhista'] != null) {
                    $nome = 'trabalhista.' . $request['pj-upload-trabalhista']->extension();
                    $request->file('pj-upload-trabalhista')->storeAs('documentacao/' . $uuid, $nome);
                }

                if ($request['pj-upload-falencia'] != null) {
                    $nome = 'falencia.' . $request['pj-upload-falencia']->extension();
                    $request->file('pj-upload-falencia')->storeAs('documentacao/' . $uuid, $nome);
                }
                if ($request['pj-upload-contratoSocial'] != null) {
                    $nome = 'contratoSocial.' . $request['pj-upload-contratoSocial']->extension();
                    $request->file('pj-upload-contratoSocial')->storeAs('documentacao/' . $uuid, $nome);
                }
                if ($request['pj-upload-cadastroNacional'] != null) {
                    $nome = 'cadastroNacional.' . $request['pj-upload-cadastroNacional']->extension();
                    $request->file('pj-upload-cadastroNacional')->storeAs('documentacao/' . $uuid, $nome);
                }
            } else if ($request->tipo == 'pf') {

                if ($request['pf-upload-rg'] != null) {
                    $nome = 'RG.' . $request['pf-upload-rg']->extension();
                    $request->file('pf-upload-rg')->storeAs('documentacao/' . $uuid, $nome);
                }
                if ($request['pf-upload-cpf'] != null) {
                    $nome = 'cpf.' . $request['pf-upload-cpf']->extension();
                    $request->file('pf-upload-cpf')->storeAs('documentacao/' . $uuid, $nome);
                }
            }

            if ($request['upload-comprovanteResidencia'] != null) {
                $nome = 'comprovanteResidencia.' . $request['upload-comprovanteResidencia']->extension();
                $request->file('upload-comprovanteResidencia')->storeAs('documentacao/' . $uuid, $nome);
            }

            if ($request['upload-cartao'] != null) {
                $nome = 'cartao.' . $request['upload-cartao']->extension();
                $request->file('upload-cartao')->storeAs('documentacao/' . $uuid, $nome);
            }

            if ($request['upload-foto1'] != null) {
                $nome = $request['titulofoto1'].'.' . $request['upload-foto1']->extension();
                $request->file('upload-foto1')->storeAs('documentacao/' . $uuid, $nome);
            }
            if ($request['upload-foto2'] != null) {
                $nome = $request['titulofoto2'].'.'  . $request['upload-foto2']->extension();
                $request->file('upload-foto2')->storeAs('documentacao/' . $uuid, $nome);
            }
            if ($request['upload-foto3'] != null) {
                $nome = $request['titulofoto3'].'.'  . $request['upload-foto3']->extension();
                $request->file('upload-foto3')->storeAs('documentacao/' . $uuid, $nome);
            }
            if ($request['upload-foto4'] != null) {
                $nome = $request['titulofoto4'].'.'  . $request['upload-foto4']->extension();
                $request->file('upload-foto4')->storeAs('documentacao/' . $uuid, $nome);
            }


            
            return redirect("comprovante/" . $uuid . "/" . $resultado_final);
        } catch (\Exception $e) {
            DB::rollback();

            dd($e->getMessage());
            return redirect()->back()->withErrors('Erro contate o suporte');
        }
        return view('pages.form');
    }

    public function comprovante($uuid, $validador)
    {
        $pass = md5($validador);
        $inscricao = DB::connection('mostra_fotografia_2023')->table('inscricao')
            ->join('proposta', 'proposta.uuidInscricao', '=', 'inscricao.uuid')
            ->where('uuid', $uuid)->where('chave', $pass)->first();
        // dd($inscricao);
        return view('pages.comprovante', compact('inscricao', 'validador'));
    }

    public function imprimirComprovante($uuid, $validador)
    {
        $pass = md5($validador);
        $inscricao = DB::connection('mostra_fotografia_2023')->table('inscricao')
            ->join('proposta', 'proposta.uuidInscricao', '=', 'inscricao.uuid')
            ->where('uuid', $uuid)->where('chave', $pass)->first();

        // dd($inscricao);
        return PDF::loadView('pages.comprovante', compact('inscricao', 'validador'))->setPaper('a4', 'landscape')->download('comprovante.pdf');
    }
}
