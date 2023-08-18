<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
    <script src="/js/cep.js"></script>
    <style>
        body {
            padding-top: 2rem;
            margin-bottom: 2rem;
            background-color: #ebe6dd;
        }

        .ocultar {
            display: none;
        }

        .exibir {
            display: block;
        }

        .separacao {
            padding-bottom: 1rem;

        }

        .box-principal {

            padding: 2rem;
            background-color: white;
            border-radius: 1rem;
            box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.4)
        }
    </style>
</head>

<body>
    <div class="ui container box-principal">

        <div style="margin: auto; text-align:center;"><img src="/img/logo-3.png"
                style="min-width: 350px; max-width: 360px;"></div>
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
        <div style="font-size: 1.5rem">
            <a href="/recurso/projetos">Projetos</a> |

            <a href="/recurso/sair">Sair</a>
        </div>
        <h2><b>Espetaculo:</b> {{ $proposta->espetaculo }}</h2>
        <h3>Recurso</h3>

        <form  class="ui form" action="/recurso/save" method="post" enctype="multipart/form-data">

            @csrf

            <div class="field">
                <label for="">Motivo</label>
                <input type="text" name="motivo" required>
            </div>
            <div class="field">
                <label for="">Justificativa</label>
                <textarea name="justificativa" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="field">
                <label data-label="Name">Anexo</label>
                <input type="file" name='recurso' accept="image/*,.pdf" >
                <input type="hidden" name="uuid" value="{{ $dados->uuid }}">
            </div>

            
            <div class="field">
                <input type="submit" value="enivar">

            </div>

         
        </form>

    </div>
    <br><br>

</body>

</html>
