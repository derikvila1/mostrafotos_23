<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" class="ui" href="/semantic/semantic.min.css">
    <script src="/semantic/semantic.min.js"></script>
    <style>
        body {
            background: linear-gradient(203deg, rgba(24, 22, 61, 1) 0%, rgba(43, 43, 114, 1) 35%, rgba(126, 27, 106, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#18163d", endColorstr="#7e1b6a", GradientType=1);
        }

        .central-block {}

        .btn-return {
            padding: 10px;
            color: rgb(168, 164, 207);
            background-color: rgba(180, 176, 224, 0.2);
            cursor: pointer;
            border-radius: 90px;
            width: 220px;
            text-align: center;
            font-family: 'Montserrat', sans-serif;
            text-transform: uppercase;

        }

        .btn-return:hover {


            border-color: rgb(214, 100, 34);
        }

        .total-width {

            position: absolute;
            left: 39%;
            top: 50%;
            transform: translate(-39%, -50%);
        }

        h1 {
            font-family: 'Montserrat', sans-serif;
        }

        h3 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
        }

        #num-erro {
            color: #bebbee;
        }

        .log-error {
            color: #9492d1;
        }

        .hour-text {
            color: #bebbee;
        }

    </style>
</head>

<body>

    <div class="total-width">

        <div class="ui text container">
            <div class="central-block">
                <div>
                    <h1 id="num-erro" style="font-size: 80px;">@yield('code')</h1>
                </div>
                <h1 style="margin-top: 4px; color: #bebbee;">@yield('message')</h1>
                <h3 style="margin-top: -5px; color: #bebbee;">@yield('submessage')</h3>
                <p class="log-error">@yield('details')</p>
                <p class="hour-text">@yield('datetime')</p>

                <a href="/">
                    <div style="margin-top: 25px;">
                        <div class="btn-return"><b>Retornar ao início</b></div>
                    </div>
                </a>

            </div>
        </div>


    </div>





</body>

</html>
