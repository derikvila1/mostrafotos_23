@extends('layouts.dashboard')

@section('title')
    Editar usuário
@endsection

@section('menu')
    started pushable
@endsection

@section('content')
    <div class="ui masthead vertical segment">
        <div class="ui container">
            <div class="introduction">
                <h1 class="ui header">
                    Usuários
                    <div class="sub header">
                        Lista de usuários na base de dados do Single Sign On
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
        <div class="ui segment left aligned">
            <div class="ui top attached label">PESQUISAR</a>
            </div>
            <form>
                <div class="ui fluid action input">
                    <input type="text" name="search" placeholder="Pesquisar">
                    <select class="ui compact selection dropdown" name="type">
                        <option selected="" value="name">pesquisar por nome</option>
                        <option value="document">pesquisar por documento</option>
                    </select>
                    <button class="ui button">Pesquisar</button>
                </div>
            </form>
        </div>

        <table class="ui compact selectable celled padded table" id='lista'>
            <thead>
                <tr>
                    <th>Sequência</th>
                    <th>Nome</th>
                    <th>Documento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <a>
                        <tr>
                            <td class="selectable"><a
                                    href='/users/show?uuid={{ $user->uuid }}'>{{ $user->id }}</a></td>
                            <td class="selectable"><a
                                    href='/users/show?uuid={{ $user->uuid }}'>{{ $user->name }}</a>
                            </td>
                            <td class="selectable"><a
                                    href='/users/show?uuid={{ $user->uuid }}'>{{ $user->document }}</a></td>
                        </tr>
                    </a>
                @endforeach
            </tbody>
            <tfoot class="full-width">
                <tr>
                    <th></th>
                    <th colspan="4">
                        <a class="ui right floated small primary labeled icon button" id='novo' href="/users/create">
                            <i class="user icon"></i> Adicionar
                            usuário </a>
                    </th>
                </tr>
            </tfoot>
        </table>
        {{ $users->links('pagination::semantic-ui') }}
        <div class="ui dividing right rail">
            <div class="ui sticky" style="left: 1199px; width: 283px !important; height: 339px !important;">
                <div class="ui vertical following fluid accordion text menu">
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $('select.dropdown')
            .dropdown();
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
