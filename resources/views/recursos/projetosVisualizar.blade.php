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

        <div style="margin: auto; text-align:center;"><img src="/img/logo-3.png" style="min-width: 350px; max-width: 360px;"></div>
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
        <h3>Analise Documental</h3>

        @if(isset($habilitacaoI->observacao))
        <p>{{$habilitacaoI->observacao}}</p>
        @else
        <p>Aguardando Analise</p>
        @endif

        <h2 class="ui dividing header">Documentação</h2>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Arquivo</th>
                    <th>Upload</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">RG</td>
                        <td data-label="Age">
                            <input type="file" name='rg' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <td data-label="Name">CPF</td>
                        <td data-label="Age">
                            <input type="file" name='cpf' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Certidão negativa</td>
                        <td data-label="Age">
                            <input type="file" name='certidaoNegativa' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                @if ($dados->tipo == 'pj')
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Comprovante de Regularidade Federal</td>
                        <td data-label="Age">
                            <input type="file" name='regularidadeFederal' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Comprovante de Regularidade estadual</td>
                        <td data-label="Age">
                            <input type="file" name='regularidadeEstadual' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Comprovante de Regularidade municipal</td>
                        <td data-label="Age">
                            <input type="file" name='regularidadeMunicipal' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Comprovante de Regularidade do FGTS</td>
                        <td data-label="Age">
                            <input type="file" name='fgts' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Declaração de representantação</td>
                        <td data-label="Age">
                            <input type="file" name='representacao' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Declaração de trabalhista</td>
                        <td data-label="Age">
                            <input type="file" name='trabalhista' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Declaração de falencia</td>
                        <td data-label="Age">
                            <input type="file" name='falencia' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Contrato social da empresa</td>
                        <td data-label="Age">
                            <input type="file" name='contratoSocial' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Cadastro nacional de pessoa Jurídica</td>
                        <td data-label="Age">
                            <input type="file" name='cadastroNacional' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                @endif
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Comprovante de residencia</td>
                        <td data-label="Age">
                            <input type="file" name='comprovanteResidencia' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Copia do Cartão</td>
                        <td data-label="Age">
                            <input type="file" name='cartao' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Reelise</td>
                        <td data-label="Age">
                            <input type="file" name='copia' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Ficha técnica</td>
                        <td data-label="Age">
                            <input type="file" name='ficha' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Autorização de apresentação expedida pelo autor ou pela SBAT (Sociedade
                            Brasileira de Autores Teatrais)</td>
                        <td data-label="Age">
                            <input type="file" name='autorizacao' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Liberação do ECAD, direitos autorais das músicas utilizadas.</td>
                        <td data-label="Age">
                            <input type="file" name='liberacao' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>
                <tr>
                    <form action="/recurso/upload" method="post" enctype="multipart/form-data">

                        @csrf
                        <td data-label="Name">Upload anexos II,III, IV, V</td>
                        <td data-label="Age">
                            <input type="file" name='anexos' accept="image/*,.pdf" required>
                        </td>
                        <td>
                            <input type="hidden" name="uuid" value="{{ $dados->uuid }}">

                            <input type="submit" value="enivar">
                        </td>
                    </form>
                </tr>

            </tbody>
        </table>
    </div>
    <br><br>

</body>

</html>