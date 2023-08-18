<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Cadastro cultura.am</title>

    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/semantic/semantic.min.css">
    <script src="/semantic/semantic.min.js"></script>

    <style>
        body {
            background: linear-gradient(50deg, rgba(180, 179, 122, 1) 0%, rgba(25, 168, 123, 1) 50%, rgba(158, 239, 255, 1) 100%);
        }

        body>.grid {
            height: 100%;
        }

        .image {
            margin-top: -100px;
        }

        .column {
            max-width: 1000px;
        }

        .img-display {
            object-fit: cover;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .flex-child {
            flex: 1;
        }

        .flex-child:first-child {
            max-width: 40%;
            min-width: 20%;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .card-body {
            border-radius: 10px;
            box-shadow: 6px 5px 9px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            margin-right: 20px;
            margin-left: 20px;
            max-height: 480px;
            min-height: 480px;
        }

        .ui.segment {
            -webkit-box-shadow: 0;
            box-shadow: none;
            border: 0px;
        }

        .ui.stacked.segment:after,
        .ui.stacked.segment:before,
        .ui.stacked.segments:after,
        .ui.stacked.segments:before {
            width: 0;
            height: 0;
        }

        .ui.error.message {
            background-color: none;
        }

        @media screen and (max-width: 800px) {
            #flex-1 {
                display: none;
            }

            #flex-2 {
                border-top-left-radius: 10px;
                border-bottom-left-radius: 10px;
            }

        }

        #flex-1 {
            background-image: url('/img/auth_cover.png');
            background-size: cover;
            background-position: center;
            max-width: 60%;
            min-width: 60%;
        }

        #flex-2 {
            background-color: white;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            padding-right: 10px;
            padding-left: 10px;
        }

    </style>

    <script>
        $(document)
            .ready(function() {
                $('.ui.form')
                    .form({
                        fields: {
                            name: {
                                identifier: 'name',
                                rules: [{
                                    type: 'empty',
                                    prompt: 'Digite seu nome completo'
                                }]
                            },
                            email: {
                                identifier: 'email',
                                rules: [{
                                        type: 'empty',
                                        prompt: 'Digite o endereço de e-mail'
                                    },
                                    {
                                        type: 'email',
                                        prompt: 'Digite um endereço de e-mail válido'
                                    }
                                ]
                            },
                            document: {
                                identifier: 'document',
                                rules: [{
                                        type: 'empty',
                                        prompt: 'Digite o número do seu CPF ou CNPJ'
                                    },
                                    {
                                        type: 'length[11]',
                                        prompt: 'Digite um número de CPF ou CNPJ válidos'
                                    },
                                    {
                                        type: 'number',
                                        prompt: 'Digite um número de CPF ou CNPJ válidos'
                                    }
                                ]
                            },
                            password: {
                                identifier: 'password',
                                rules: [{
                                        type: 'empty',
                                        prompt: 'Digite sua senha'
                                    },
                                    {
                                        type: 'length[8]',
                                        prompt: 'Sua senha deve possuir no mínimo 8 caracteres'
                                    }
                                ]
                            },
                            password_confirmation: {
                                identifier: 'password_confirmation',
                                rules: [{
                                        type: 'empty',
                                        prompt: 'Digite confirmação de senha'
                                    },
                                    {
                                        type: 'length[8]',
                                        prompt: 'A confirmação de senha deve possuir no mínimo 8 caracteres'
                                    }
                                ]
                            }
                        }
                    });
            });
    </script>
</head>

<body>
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <form method="POST" class="ui large form">
                @csrf
                <div class="ui error message" style="margin-right: 20px; margin-left: 20px;"></div>
                @if ($errors->any())
                    <div class="ui red message" style="margin-right: 20px; margin-left: 20px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <div class="flex-child" id="flex-1">
                    </div>

                    <div class="flex-child" id="flex-2">

                        <div class="ui segment">
                            <h2 class="ui inverted image header">
                                <div class="content">
                                    <img src="/img/color_logo.png">
                                </div>
                            </h2>
                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="address card icon"></i>
                                    <input type="text" name="name" placeholder="Nome completo ou razão social">
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="at icon"></i>
                                    <input type="email" name="email" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="user icon"></i>
                                    <input type="number" name="document" placeholder="CPF ou CNPJ">
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="lock icon"></i>
                                    <input type="password" name="password" placeholder="Senha">
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="lock icon"></i>
                                    <input type="password" name="password_confirmation"
                                        placeholder="Confirmação de senha">
                                </div>
                            </div>
                            <div class="ui fluid large teal submit button">Cadastrar-se</div>

                            <p style="margin-top:15px; margin-bottom:0px;"> Já possui cadastro? <a
                                    href="/login">Entre</a>
                            <p>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
