<?php

use App\Http\Controllers\PermissionController;
?>

@extends('layouts.dashboard')

@section('title')
{{ $inscricao->pfNome ?? $inscricao->pjNome }}
@endsection

@section('menu')
started pushable
@endsection

@section('content')
<div class="ui masthead vertical segment">
    <div class="ui container">
        <div class="introduction">
            <h1 class="ui header">
                Inscrição Do Candidato
                <div class="sub header">
                    Proposta
                </div>
            </h1>
            <div class="ui hidden divider"></div>
            <!-- Mensagem de notificação ou erro -->
            @if (!empty($message))
            <div class="ui success message">
                <i class="close icon"></i>
                <div class="header">
                    {{ $message }}
                </div>
            </div>
            @endif
            @if ($errors->any())
            <div class="ui error message">
                <i class="close icon"></i>
                <div class="header">
                    Ocorreu um problema com a sua solicitação
                </div>
                <ul class="list">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="main ui intro container">
    <h2 class="ui dividing header">Inscrição</h2>

    <div class="ui form">
        @if($inscricao->tipo == 'pj')
        <div class="field">
            <label for="">Nome Fantasia</label>
            <input type="text" value="{{$inscricao->pjNome ?? ''}}" readonly>
        </div>

        <div class="two fields">
            <div class="field">
                <label for="">CPF</label>
                <input type="text" value="{{$inscricao->pjCpf ?? ''}}" readonly>
            </div>
            <div class="field">
                <label for="">RG</label>
                <input type="text" value="{{$inscricao->pjRg ?? ''}}" readonly>
            </div>
        </div>

        @else
        <div class="field">
            <label for="">Nome</label>
            <input type="text" value="{{$inscricao->pfNome ?? ''}}" readonly>
        </div>
   
        <div class="three fields">
           
            <div class="field">
                <label for="">Nacionalidade</label>
                <input type="text" value="{{$inscricao->pfNacionalidade ?? ''}}" readonly>
            </div>
            <div class="field">
                <label for="">Nascimento</label>
                <input type="text" value="{{$inscricao->pfNascimento ?? ''}}" readonly>
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label for="">CPF</label>
                <input type="text" value="{{$inscricao->pfCpf ?? ''}}" readonly>
            </div>
            <div class="field">
                <label for="">RG</label>
                <input type="text" value="{{$inscricao->pfRg ?? ''}}" readonly>
            </div>
        </div>
        @endif
        <div class="two fields">
            <div class="field">
                <label for="">CEP</label>
                <input type="text" value="{{$inscricao->cep ?? ''}}" readonly>
            </div>
            <div class="field">
                <label for="">Endereço</label>
                <input type="text" value="{{$inscricao->endereco ?? ''}}" readonly>
            </div>
        </div>
        <div class="three fields">
            <div class="field">
                <label for="">Bairro</label>
                <input type="text" value="{{$inscricao->bairro ?? ''}}" readonly>
            </div>
            <div class="field">
                <label for="">Municipio</label>
                <input type="text" value="{{$inscricao->municipio ?? ''}}" readonly>
            </div>
            <div class="field">
                <label for="">UF</label>
                <input type="text" value="{{$inscricao->uf ?? ''}}" readonly>
            </div>
        </div>
        <div class="three fields">
            <div class="field">
                <label for="">Telefone Principal</label>
                <input type="text" value="{{$inscricao->fone1 ?? ''}}" readonly>
            </div>
            <div class="field">
                <label for="">Telefone Secundario</label>
                <input type="text" value="{{$inscricao->fone2 ?? ''}}" readonly>
            </div>
            <div class="field">
                <label for="">E-mail</label>
                <input type="text" value="{{$inscricao->email ?? ''}}" readonly>
            </div>
        </div>
      
    </div>

    <h2 class="ui dividing header">Proposta</h2>

    <div class="two fields">

    <div class='field'>
        <label for="">Título Foto - 1   :</label>
        <input type="text" value="{{$inscricao->titulofoto1 ?? ''}}" style="width: 450px;" readonly>
        <br>
        <label for="">Distinção Foto - 1</label>
        <input type="text" value="{{$inscricao->distincaofoto1 ?? ''}}" style="width: 450px;" readonly>
    </div>
    <hr>

    <div class='field'>
        <label for="">Título Foto - 2   :</label>
        <input type="text" value="{{$inscricao->titulofoto2 ?? ''}}" style="width: 450px;" readonly>
        <br>
        <label for="">Distinção Foto - 2</label>
        <input type="text" value="{{$inscricao->distincaofoto2 ?? ''}}" style="width: 450px;" readonly>
    </div>
    <hr>

    <div class='field'>
        <label for="">Título Foto - 3   :</label>
        <input type="text" value="{{$inscricao->titulofoto3 ?? ''}}" style="width: 450px;" readonly>
        <br>
        <label for="">Distinção Foto - 3</label>
        <input type="text" value="{{$inscricao->distincaofoto3 ?? ''}}" style="width: 450px;" readonly>
    </div>
    <hr>

    <div class='field'>
        <label for="">Título Foto - 4   :</label>
        <input type="text" value="{{$inscricao->titulofoto4 ?? ''}}" style="width: 450px;" readonly>
        <br>
        <label for="">Distinção Foto - 4</label>
        <input type="text" value="{{$inscricao->distincaofoto4 ?? ''}}" style="width: 450px;" readonly>
    </div>
    <hr>

</div>


   

    <h2 class="ui dividing header">Documentação</h2>
    <table class="ui celled table">
        <thead>
            <tr>
                <th>Arquivo</th>
                <th>Baixar</th>
            </tr>
        </thead>
        <tbody>

            @foreach($documentos as $dados)
            @if($dados != '.' && $dados != '..' )

           
            <tr>
                <td data-label="Name"> {{$dados}}</td>
                @if($dados == 'foto1.jpg')
                    <td><span>título :  </span></td>
                @endif
                <td data-label="Age"><a href="/baixar/{{$inscricao->uuid}}/{{$dados}}">Clique aqui</a></td>
            </tr>

            @endif
            @endforeach
        </tbody>
    </table>


    @foreach($minhasPermissoes as $dados)
    @if($dados->permission == 802)
     @include('dashboard.habilitacaoI')
     @endif
    @endforeach

    @foreach($minhasPermissoes as $dados)
    @if($dados->permission == 803)
    @include('dashboard.habilitacaoII')
    @endif
    @endforeach
    @foreach($minhasPermissoes as $dados)
    @if($dados->permission == 804)
    @include('dashboard.habilitacaoIII')
    @endif
    @endforeach
    @foreach($minhasPermissoes as $dados)
    @if($dados->permission == 805)
    @include('dashboard.avaliacaoI')
    @endif
    @endforeach
    @foreach($minhasPermissoes as $dados)
    @if($dados->permission == 806)
    @include('dashboard.avaliacaoII')
    @endif
    @endforeach
    @foreach($minhasPermissoes as $dados)
    @if($dados->permission == 807)
    @include('dashboard.avaliacaoIII')
    @endif
    @endforeach
    @foreach($minhasPermissoes as $dados)
    @if($dados->permission == 808)
    @include('dashboard.avaliacaoIV')
    @endif
    @endforeach


    <h2 class="ui dividing header">Historico</h2>
    <table class="ui celled table">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Autor da ação</th>
                <th>Data da ação</th>
            </tr>
        </thead>
        <tbody>

            @foreach($historico as $dados)

            <tr>
                <td data-label="Age">{{$dados->log}}</td>
                <td data-label="Name"> {{$dados->uuidAutor}}</td>
                <td data-label="Age">{{$dados->created_at}}</td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <!-- Barra de informações lateral -->

</div>


<!-- Seleciona a página atual como ativa nos menus -->

<script>
    $('select.dropdown')
        .dropdown();
</script>
<script>
    $('.ui.checkbox')
        .checkbox();
</script>
<script>
    $('.message .close')
        .on('click', function() {
            $(this)
                .closest('.message')
                .transition('fade');
        });
</script>
@endsection