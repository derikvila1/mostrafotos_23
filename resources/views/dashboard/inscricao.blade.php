@extends('layouts.dashboard')

@section('title')
inscritos
@endsection

@section('menu')
started pushable
@endsection

@section('content')
<div class="ui masthead vertical segment">
    <div class="ui container">
        <div class="introduction">
            <h1 class="ui header">
                Incrições
                <div class="sub header">
                    Lista de inscritos
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
                <input type="text" name="search" placeholder="Buscar por sequencia">
                <!-- <select class="ui compact selection dropdown" name="type">
                    <option selected="" value="name">pesquisar por nome</option>
                    <option value="document">pesquisar por documento</option>
                </select> -->
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
                <th>Habilitador I(Doc)</th>
                <th>Habilitador II(Doc)</th>
                <th>Habilitador III(Doc)</th>
                <!-- <th>Avaliação I (curadoria)</th>
                <th>Avaliação II (curadoria)</th>
                <th>Avaliação III (curadoria)</th>
                <th>Avaliação VI (curadoria)</th> -->


            </tr>
        </thead>
        <tbody>
            @foreach ($inscricao as $user)
            <a>
                <tr>
                    <td class="selectable"><a href='/panel/inscritos/visualizar/{{ $user->uuid }}'>{{ $user->id }}</a></td>
                    <td class="selectable"><a href='/panel/inscritos/visualizar/{{ $user->uuid }}'>{{ $user->pfNome ??   $user->pjNome}}</a></td>
                    <td class="selectable"><a href='/panel/inscritos/visualizar/{{ $user->uuid }}'>{{ $user->pfCpf ?? $user->pjCpf }}</a></td>
                    <td class="selectable">
                        <a href='/panel/inscritos/visualizar/{{ $user->uuid }}'>
                            @if(isset($user->habI->avaliacao))
                            @if($user->habI->avaliacao == 0)
                            Habilitado
                            @else
                            Inabilitado
                            @endif
                           
                            @else
                            pendente de analise
                            @endif
                        </a>
                    </td>
                    <td class="selectable">
                        <a href='/panel/inscritos/visualizar/{{ $user->uuid }}'>
                        @if(isset($user->habII->avaliacao))
                            @if($user->habII->avaliacao == 0)
                            Habilitado
                            @else
                            Inabilitado
                            @endif
                           
                            @else
                            pendente de analise
                            @endif
                        </a>
                    </td>
                    <td class="selectable">
                        <a href='/panel/inscritos/visualizar/{{ $user->uuid }}'>
                        @if(isset($user->habIII->avaliacao))
                            @if($user->habIII->avaliacao == 0)
                            Habilitado
                            @else
                            Inabilitado
                            @endif
                           
                            @else
                            pendente de analise
                            @endif
                        </a>
                    </td>
                    <!-- <td class="selectable">
                        <a href='/panel/inscritos/visualizar/{{ $user->uuid }}'>
                            pendente de analise
                        </a>
                    </td>
                    <td class="selectable">
                        <a href='/panel/inscritos/visualizar/{{ $user->uuid }}'>
                           pendente de analise
                        </a>
                    </td>
                    <td class="selectable">
                        <a href='/panel/inscritos/visualizar/{{ $user->uuid }}'>
                           
                        </a>
                    </td>
                    <td class="selectable">
                        <a href='/panel/inscritos/visualizar/{{ $user->uuid }}'>
                            pendente de analise
                        </a>
                    </td> -->

                </tr>
            </a>
            @endforeach
        </tbody>
        <tfoot class="full-width">
            <!-- <tr>
                <th></th>
                <th colspan="4">
                    <a class="ui right floated small primary labeled icon button" id='novo' href="/users/create">
                        <i class="user icon"></i> Adicionar
                        usuário </a>
                </th>
            </tr> -->
        </tfoot>
    </table>
    {{ $inscricao->links('pagination::semantic-ui') }}
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