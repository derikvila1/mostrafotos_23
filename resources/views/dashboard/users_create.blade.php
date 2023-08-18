@extends('layouts.dashboard')

@section('title')
    Adicionar novo usuário
@endsection

@section('menu')
    started pushable
@endsection

@section('content')
    <div class="ui masthead vertical segment">
        <div class="ui container">
            <div class="introduction">
                <h1 class="ui header">
                    Adicionar novo usuário
                    <div class="sub header">
                        Adiciona novo usuário
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
        <h2 class="ui dividing header">Cadastro</h2>
        <form method="POST" enctype="multipart/form-data" class="ui form">
            @csrf
            <h4 class="ui dividing header">Dados do usuário</h4>
            <div class="field">
                <label>Nome</label>
                <input type="text" name="name" placeholder="Nome" maxlength="255" required>
            </div>
            <div class="two fields">
                <div class="field">
                    <label>E-mail</label>
                    <input type="email" name="email" placeholder="E-mail" maxlength="255" required>
                </div>
                <div class="field">
                    <label>Documento</label>
                    <input type="number" name="document" placeholder="Documento" maxlength="14" required>
                </div>
            </div>
            <h4 class="ui dividing header">Senha</h4>
            <div class="two fields">
                <div class="field">
                    <label>Senha</label>
                    <input type="password" name="password" placeholder="Senha" maxlength="32" required>
                </div>
                <div class="field">
                    <label>Confirmação da senha</label>
                    <input type="password" name="password_confirm" placeholder="Confirmação da senha" maxlength="32" required>
                </div>
            </div>
            <h4 class="ui dividing header">Permissões</h4>
            <div class="field">
                <label>Permissões</label>
                <select multiple="" class="ui dropdown" name="permissions[]">
                    <option value="">Selecione as permissões do usuário</option>
                    @foreach ($permissoes as $permissao)
                        <option value="{{ $permissao->id }}">[{{ $permissao->id }}] {{ $permissao->name }}:
                            {{ $permissao->description }}</option>
                    @endforeach
                </select>
            </div>
            <button class="ui primary button">Adicionar usuário</button>
        </form>
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
    <script>
        document.getElementById('usuarios').classList.add('active');
        document.getElementById('menu-usuarios').classList.add('active');
    </script>
@endsection