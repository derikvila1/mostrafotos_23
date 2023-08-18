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

        <div align="center" style="margin: auto;  padding: 1rem">
            <h2>Comprovante</h2>

        </div>
        <h3>Espetaculo: {{$inscricao->espetaculo ??  ''}}</h3>
    
    <p>Nome: {{$inscricao->pfNome ??  $inscricao->pjNome}}</p>
    <p>CPF: {{$inscricao->pfCpf ??  $inscricao->pjCpf}}</p>
    <p>Fone: {{$inscricao->fone1 ?? ''}}</p>
    <p>Email: {{$inscricao->email  ??  ''}}</p>
   
       <h3>Senha de Acesso: {{$validador}} </h3> 



       obs: Anote a sua senha de acesso
        {{-- <a href="/imprimirComprovante/{{$inscricao->uuid}}/{{$validador}}" target="_blanck">Imprimir Comprovante</a> --}}
    </div>
    <br><br>
    <script>
        $('.ui.dropdown').dropdown();
        $("#pj").change(function() {
            $('#div-pf').transition('zoom');
            setTimeout(function() {
                $('#div-pj').transition('zoom');
            }, 200);
        });
        $("#pf").change(function() {

            $('#div-pj').transition('zoom');
            setTimeout(function() {
                $('#div-pf').transition('zoom');
            }, 100);
        });
    </script>
</body>

</html>