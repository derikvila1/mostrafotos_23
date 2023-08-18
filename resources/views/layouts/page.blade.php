<!DOCTYPE html>

<html lang="pt">

<head>
    <!-- Metadados base -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>@yield('title')</title>

    <!-- Dependências necessárias para o Semantic UI -->
    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" class="ui" href="/semantic/semantic.min.css">
    <script src="/semantic/semantic.min.js"></script>

    <!-- Seção passível a remoção -->
    <script src="/js/highlight.min.js"></script>
    <script src="/js/docs.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/docs.css">

    <!-- Adiciona seção para o head nas páginas que herdam esta -->
    @yield("head")

    <style type="text/css">
        .hidden.menu {
            display: none;
        }

        .masthead.segment {
            background: #006e73 !important;
            padding: 1em 0em;
        }

        .ui.vertical.sidebar.menu {
            background: #006e73 !important;
        }

        .masthead .logo.item img {
            margin-right: 1em;
        }

        .masthead .ui.menu .ui.button {
            margin-left: 0.5em;
        }

        .masthead h1.ui.header {
            margin-top: 3em;
            margin-bottom: 0em;
            font-size: 4em;
            font-weight: normal;
        }

        .masthead h2 {
            font-size: 1.7em;
            font-weight: normal;
        }

        .ui.vertical.stripe {
            padding: 8em 0em;
        }

        .ui.vertical.stripe h3 {
            font-size: 2em;
        }

        .ui.vertical.stripe .button+h3,
        .ui.vertical.stripe p+h3 {
            margin-top: 3em;
        }

        .ui.vertical.stripe .floated.image {
            clear: both;
        }

        .ui.vertical.stripe p {
            font-size: 1.33em;
        }

        .ui.vertical.stripe .horizontal.divider {
            margin: 3em 0em;
        }

        .quote.stripe.segment {
            padding: 0em;
        }

        .quote.stripe.segment .grid .column {
            padding-top: 5em;
            padding-bottom: 5em;
        }

        .footer.segment {
            background: #006e73 !important;
            padding: 5em 0em;
        }

        .secondary.pointing.menu {
            border-width: 0px !important;
        }

        .secondary.pointing.menu .toc.item {
            display: none;
        }

        .ui.top.fixed.menu {
            background: #006e73 !important;
        }

        @media only screen and (max-width: 700px) {
            .ui.fixed.menu {
                display: none !important;
            }

            .secondary.pointing.menu .item,
            .secondary.pointing.menu .menu {
                display: none;
            }

            .secondary.pointing.menu .toc.item {
                display: block;
            }

            .masthead.segment {
                min-height: 350px;
            }

            .masthead h1.ui.header {
                font-size: 2em;
                margin-top: 1.5em;
            }

            .masthead h2 {
                margin-top: 0.5em;
                font-size: 1.5em;
            }
        }

    </style>

    <script>
        $(document)
            .ready(function() {

                // fix menu when passed
                $('.masthead')
                    .visibility({
                        once: false,
                        onBottomPassed: function() {
                            $('.fixed.menu').transition('fade in');
                        },
                        onBottomPassedReverse: function() {
                            $('.fixed.menu').transition('fade out');
                        }
                    });

                // create sidebar and attach to menu open
                $('.ui.sidebar')
                    .sidebar('attach events', '.toc.item');

            });
    </script>
</head>

<body class="pushable">
    <!-- Menu flutuante -->
    <div class="ui inverted large top fixed hidden menu">
        <div class="ui container">
            <a class="item" id="floating-inicio"
                href="{{ 'https://cadastroestadual' . env('SESSION_DOMAIN') }}">Início</a>
            <a class="item" id="floating-cadastro-estadual"
                href="{{ 'https://cadastroestadual' . env('SESSION_DOMAIN') }}">Cadastro estadual</a>
            <a class="item" id="floating-editais" href="{{ 'https://editais' . env('SESSION_DOMAIN') }}">Editais</a>
            <a class="item" id="floating-projetos"
                href="{{ 'https://catalogoleialdirblanc' . env('SESSION_DOMAIN') }}">Projetos</a>
            <div class="right menu">
                @if (Auth::check())
                    <div class="item">
                        <a class="ui button" href="/dashboard">Painel</a>
                    </div>
                    <div class="item">
                        <a class="ui primary button" onclick="document.getElementById('logout').submit()">Sair</a>
                    </div>
                @else
                    <div class="item">
                        <a class="ui button" href="/login">Entrar</a>
                    </div>
                    <div class="item">
                        <a class="ui primary button" href="/register">Cadastre-se</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Menu Lateral -->
    <div class="ui vertical inverted sidebar menu left">
        <a class="item" id="sidebar-inicio" href="{{ 'https://cadastroestadual' . env('SESSION_DOMAIN') }}">Início</a>
        <a class="item" id="sidebar-cadastro-estadual"
            href="{{ 'https://cadastroestadual' . env('SESSION_DOMAIN') }}">Cadastro Estadual</a>
        <a class="item" id="sidebar-editais" href="{{ 'https://editais' . env('SESSION_DOMAIN') }}">Editais</a>
        <a class="item" id="sidebar-projetos"
            href="{{ 'https://catalogoleialdirblanc' . env('SESSION_DOMAIN') }}">Projetos</a>
        @if (Auth::check())
            <a class="item" href="/dashboard">Painel</a>
            <a class="item" onclick="document.getElementById('logout').submit()">Sair</a>
        @else
            <a class="item" href="/login">Entrar</a>
            <a class="item" href="/register">Cadastre-se</a>
        @endif
    </div>


    <!-- Menu do topo -->
    <div class="pusher">
        <div class="ui inverted vertical masthead center aligned segment">

            <div class="ui container">
                <div class="ui large secondary inverted pointing menu">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>
                    <a class="item" id="top-inicio"
                        href="{{ 'https://cadastroestadual' . env('SESSION_DOMAIN') }}">Início</a>
                    <a class="item" id="top-cadastro-estadual"
                        href="{{ 'https://cadastroestadual' . env('SESSION_DOMAIN') }}">Cadastro Estadual</a>
                    <a class="item" id="top-editais"
                        href="{{ 'https://editais' . env('SESSION_DOMAIN') }}">Editais</a>
                    <a class="item" id="top-projetos"
                        href="{{ 'https://catalogoleialdirblanc' . env('SESSION_DOMAIN') }}">Projetos</a>
                    <div class="right item">
                        @if (Auth::check())
                            <a class="ui inverted button" href="/dashboard">Painel</a>
                            <a class="ui inverted button" onclick="document.getElementById('logout').submit()">Sair</a>
                        @else
                            <a class="ui inverted button" href="/login">Entrar</a>
                            <a class="ui inverted button" href="/register">Cadastre-se</a>
                        @endif
                    </div>
                </div>
            </div>
            @yield("header")
        </div>

        @yield("content")

        <div class="ui inverted vertical footer segment">
            <div class="ui container">
                <div class="ui stackable inverted divided equal height stackable grid">
                    <div class="three wide column">
                        <h4 class="ui inverted header">Cultura.am</h4>
                        <div class="ui inverted link list">
                            <a href="https://cultura.am.gov.br/" class="item">Portal da cultura</a>
                            <a href="/" class="item">Perguntas frequentes</a>
                            <a href="/" class="item">Contato</a>
                        </div>
                    </div>
                    <div class="three wide column">
                        <h4 class="ui inverted header">Serviços ao cidadão</h4>
                        <div class="ui inverted link list">
                            <a href="{{ 'https://cadastroestadual' . env('SESSION_DOMAIN') }}" class="item">Cadastro
                                Estadual de Cultura</a>
                            <a href="{{ 'https://editais' . env('SESSION_DOMAIN') }}" class="item">Editais da
                                cultura</a>
                            <a href="{{ 'https://catalogoleialdirblanc' . env('SESSION_DOMAIN') }}"
                                class="item">Catálogo de projetos</a>
                        </div>
                    </div>
                    <div class="seven wide column">
                        <img src="/img/secretaria.svg" style="height: 48px; margin: 8px">
                        <img src="/img/estado.svg" style="height: 48px; margin: 8px">
                        <img src="/img/cultura.svg" style="height: 48px; margin: 8px">
                        <div class="ui inverted link list">
                            <a class="item"
                                href="https://cultura.am.gov.br/portal/index.php/equipe-do-portal/">Desenvolvimento:
                                Inovação e Tecnologia Audiovisual</ </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="/logout" id="logout">
        @csrf
    </form>
</body>

</html>
