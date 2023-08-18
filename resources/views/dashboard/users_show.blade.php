@extends('layouts.dashboard')

@section('title')
    {{ $user->name }}
@endsection

@section('menu')
    started pushable
@endsection

@section('content')
    <div class="ui masthead vertical segment">
        <div class="ui container">
            <div class="introduction">
                <h1 class="ui header">
                    Editar usuário
                    <div class="sub header">
                        Alterar informações de entrada, permissões e exclusão de usuário
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
                <input type="text" name="name" placeholder="Nome" value="{{ $user->name }}" maxlength="255" required>
            </div>
            <div class="two fields">
                <div class="field">
                    <label>E-mail</label>
                    <input type="email" name="email" placeholder="E-mail" value="{{ $user->email }}" maxlength="255"
                        required>
                </div>
                <div class="field">
                    <label>Documento</label>
                    <input type="number" name="document" placeholder="Documento" value="{{ $user->document }}"
                        maxlength="14" required>
                </div>
            </div>
            <h4 class="ui dividing header">Senha</h4>
            <div class="two fields">
                <div class="field">
                    <label>Senha</label>
                    <input type="password" name="password" placeholder="Senha" maxlength="32">
                </div>
                <div class="field">
                    <label>Confirmação da senha</label>
                    <input type="password" name="password_confirm" placeholder="Confirmação da senha" maxlength="32">
                </div>
            </div>
            <button class="ui primary button">Salvar alterações</button>
        </form>

        <h2 class="ui dividing header">Permissões</h2>
        @if (sizeof($user_permissions))
            <h4 class="ui header">Permissões atuais</h4>
            <table class="ui compact table">
                <thead>
                    <tr>
                        <th>Permissão</th>
                        <th>Aplicação</th>
                        <th>Descrição</th>
                        <th>Data de concessão</th>
                        <th>Concedido por</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_permissions as $user_permission)
                        <tr>
                            <td>{{ $user_permission->id }}</td>
                            <td>{{ $user_permission->application }} </td>
                            <td>{{ $user_permission->permission }}</td>
                            <td>{{ $user_permission->grant_date }}</td>
                            <td>{{ $user_permission->granted_by }}</td>
                            <td>
                                <form method="POST"
                                    action="/users/deletePermission?uuid={{ $user->uuid }}&permission={{ $user_permission->id }}">
                                    @csrf
                                    <button class="ui negative icon button"><i class="trash alternate outline icon"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <form method="POST" action="/users/grantPermission?uuid={{ $user->uuid }}" class="ui form">
            @csrf
            <h4 class="ui header">Adicionar permissão</h4>
            <div class="field">
                <label>Permissões</label>
                <select multiple="" class="ui dropdown" name="permissions[]" required>
                    <option value="">Selecione as permissões do usuário</option>
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}">[{{ $permission->id }}] {{ $permission->name }}:
                            {{ $permission->description }}</option>
                    @endforeach
                </select>
            </div>
            <button class="ui primary button">Adicionar permissão</button>
        </form>

        <h2 class="ui dividing header">Excluir cadastro</h2>
        <form method="POST" action="/users/delete?uuid={{ $user->uuid }}" class="ui form">
            @csrf
            <div class="ui segment">
                <div class="field">
                    <div class="ui toggle checkbox">
                        <input type="checkbox" name="delete" tabindex="0" class="hidden" required>
                        <label>Concordo em excluir os dados do usuário e todos os dados associados a ele</label>
                    </div>
                </div>
            </div>

            <button class="negative ui button">Excluir cadastro</button>
        </form>

        <!-- Barra de informações lateral -->
        <div class="ui dividing right rail">
            <div class="ui sticky" style="left: 1199px; width: 283px !important; height: 339px !important;">
                <div class="ui vertical following fluid accordion text menu">
                    <h4 class="ui dividing header">Informações do cadastro</h4>
                    <div class="ui list">
                        <div class="item">
                            <div class="header">Sequencial do Cadastro</div>
                            {{ $user->id }}
                        </div>
                        <div class="item">
                            <div class="header">Criado por</div>
                            {{ $user->created_by }}
                        </div>
                        <div class="item">
                            <div class="header">Data de criação</div>
                            {{ $user->created_at }}
                        </div>
                        <div class="item">
                            <div class="header">Data da última modificação</div>
                            {{ $user->updated_at }}
                        </div>
                    </div>
                    <h4 class="ui dividing header">Informações de entrada</h4>
                    <div class="ui list">
                        <div class="item">
                            <div class="header">Último login</div>
                            {{ $user->last_login }}
                        </div>
                        <div class="item">
                            <div class="header">Último endereço IP</div>
                            {{ $user->las_ip_address }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui basic modal">
        <div class="ui icon header">
            <i class="archive icon"></i>
            Archive Old Messages
        </div>
        <div class="content">
            <p>Your inbox is getting full, would you like us to enable automatic archiving of old messages?</p>
        </div>
        <div class="actions">
            <div class="ui red basic cancel inverted button">
                <i class="remove icon"></i>
                No
            </div>
            <div class="ui green ok inverted button">
                <i class="checkmark icon"></i>
                Yes
            </div>
        </div>
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
