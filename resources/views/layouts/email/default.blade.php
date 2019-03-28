<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">

    </head>

    <style>
        body{

        }
        .cabecalho{
            margin: 0 0 20px 0;
            padding: 5px;
            width: 100%;
            height: 10%;
            background: #D3D3D3;
            color: #636b6f;
            text-align: center;
        }

        .container{
            width: 60%;
            margin: 0 auto;
            text-align: center;
            color: #636b6f;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;

        }

        p{
            font-size: 12px;
        }

    </style>

    <body>

    <div class="cabecalho"><h3>Lean Business Associates</h3></div>

    <div class="container">
    @yield('content')
    </div>


    </body>

</html>