<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MOSTRA FOTOGRÁFICA </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @keyframes fadein {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Firefox < 16 */
        @-moz-keyframes fadein {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Safari, Chrome and Opera > 12.1 */
        @-webkit-keyframes fadein {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Internet Explorer */
        @-ms-keyframes fadein {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Opera < 12.1 */
        @-o-keyframes fadein {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('/img/fundo-bg-corpos.png');
            background-size: cover;
            background-position: center;
            -webkit-animation: fadein 2s;
            /* Safari, Chrome and Opera > 12.1 */
            -moz-animation: fadein 2s;
            /* Firefox < 16 */
            -ms-animation: fadein 2s;
            /* Internet Explorer */
            -o-animation: fadein 2s;
            /* Opera < 12.1 */
            animation: fadein 2s;
        }

        .header-top {
            margin: auto;
            width: 90%;
            max-width: 1080px;

            height: 100%;
            background-color: white;
        }



        .img-fundo {}

        .ui .segment {
            text-align: center;
            cursor: pointer;
        }

        .div-style-1 {

            padding-left: 5%;
            padding-right: 5%;
            background-color: white;

        }


        .div-style-2 {

            padding-left: 5%;
            padding-right: 5%;

            background-color: beige;

        }

        .titulo-1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            color: rgb(121, 87, 69);
            font-size: 26px;
        }

        .texto-c {
            font-size: 16px;
            color: rgb(144, 105, 85);
        }

        .div-padding {
            padding-top: 28px;
            padding-bottom: 28px;
        }

        .botao-insc {
            border-radius: 10px;
            background-color: rgb(148, 201, 142);
            width: 120px;
            margin: auto;
            padding: 10px;
            cursor: pointer;
        }

        .botao-insc:hover {
            border-radius: 10px;
            background-color: rgb(199, 201, 142);

            margin: auto;
            padding: 10px;
            cursor: pointer;
        }

        .prorrogado{
            font-family: 'Poppins', sans-serif;
            font-weight: 900;
            color: black;
            font-size: 36px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header-top">

        <br>
        <div style="margin: auto; text-align:center;"><img src="/img/logo-3.jpg" style="min-width: 350px; max-width: 360px;">
    </div>
    <div style="background-color:rgb(255, 222, 175); width:200px; height:8px; margin:auto; margin-top:16px;"></div>
    <h1 class="prorrogado" >
        ENCERRADO!!
    </h1>
       
        <!--<p style="text-align: center; max-width: 800px; margin: auto; margin-top: 15px; font-size: 17px; color:rgb(125, 44, 0); ">Concurso para concessão do prêmio Amazonas Criativo</p>-->
        <div class="div-style-1">
            <div class="div-padding">
                <h1 class="titulo-1">| O que é?</h1>
                <p class="texto-c">O Festival Amazonas de Dança (FAD), promovido pelo Governo do Amazonas, por meio da
                    Secretaria de Estado de Cultura e Economia Criativa e Agência Amazonense de Desenvolvimento Cultural
                    (AADC), chega a sua décima primeira edição, objetivando a seleção de propostas para preenchimento de pautas
                    artísticas no período de 24 de julho a 10 de agosto de 2023 em espaços culturais da capital amazonense.</p>
            </div>
        </div>

        <div class="div-style-2 ">
            <div class="div-padding">
                <h1 class="titulo-1">| Inscrições</h1>
                <p class="texto-c">Estão abertas, até às 23h59 do dia 9 de agosto de 2023, as inscrições para o edital
                    público n° 003/2023, que vai disponibilizar apoio financeiro e logístico à entidade artística, da
                    capital ou do interior, aprovadas neste edital, conforme os critérios e requisitos pré
                    estabelecidos. </p>
            </div>
        </div>
        <div class="div-style-1">
            <div class="div-padding">
                <h1 class="titulo-1">| Como se inscrever?</h1>
                <p class="texto-c">A documentação e o material contendo a gravação do espetáculo, exigidos no edital
                    citado, deverão ser preenchidos no link <a href="/">http://cdn2.cultura.am.gov.br</a>, no período de 24 de julho a 7 de agosto de 2023.</p>
            </div>
        </div>

        <div class="div-style-2 ">
            <div class="div-padding">
                <h1 class="titulo-1">| Quem pode participar?</h1>
                <p class="texto-c">Podem se inscrever pessoas físicas, maiores de 18 anos, domiciliados no Estado do
                    Amazonas, sendo artistas individuais ou representantes de um grupo de dança. Os participantes não
                    podem estar inseridos na cadeia produtiva da cultura e economia criativa do Estado ou atuarem como
                    membros das comissões de curadoria e organização. Podem participar deste edital, pessoas jurídicas
                    de direito privado, com ou sem fins lucrativos, incluindo grupos ou companhias com finalidade
                    artística ou cultural, compatível com o CNPJ. </p>
            </div>
        </div>
        <div class="div-style-1">
            <div class="div-padding">
                <h1 class="titulo-1">| Posso inscrever quantos projetos?</h1>
                <p class="texto-c">Cada proponente pode inscrever até dois projetos diferentes, sendo que somente um
                    poderá ser aprovado. </p>
            </div>
        </div>

        <div class="div-style-2 ">
            <div class="div-padding">
                <h1 class="titulo-1">| Qual o valor de recursos por projeto?</h1>
                <p class="texto-c">O proponente poderá receber o cachê bruto no valor mínimo de R$ 3.500,00 (três mil e
                    quinhentos reais) até o valor máximo de R$ 14.000,00 (quatorze mil reais), dependendo do tempo de
                    duração das apresentações artísticas. </p>
            </div>
        </div>
        <div class="div-style-1">
            <div class="div-padding" style="text-align: center;">
                <!-- <br>
                <h1 class="titulo-1">Inscreva-se</h1>
                 <a href="/inscricao">
                    <div class="botao-insc"><i class='bx bx-right-arrow-alt' style="font-size: 35px; color: rgb(0, 94, 63);"></i></div>
                </a>  -->

                <!-- <h1 class="titulo-1">Recursos</h1>
                 <a href="/recurso/login">
                    <div class="botao-insc"><i class='bx bx-right-arrow-alt' style="font-size: 35px; color: rgb(0, 94, 63);"></i></div>
                </a>  -->
            </div>
            <br><br>
        </div>

    </div>
</body>

</html>