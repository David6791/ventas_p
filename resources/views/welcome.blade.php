<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background: rgba(254,254,254,1);
background: -moz-linear-gradient(left, rgba(254,254,254,1) 0%, rgba(219,219,219,1) 0%, rgba(214,214,214,1) 50%, rgba(212,212,212,1) 74%, rgba(209,209,209,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(254,254,254,1)), color-stop(0%, rgba(219,219,219,1)), color-stop(50%, rgba(214,214,214,1)), color-stop(74%, rgba(212,212,212,1)), color-stop(100%, rgba(209,209,209,1)));
background: -webkit-linear-gradient(left, rgba(254,254,254,1) 0%, rgba(219,219,219,1) 0%, rgba(214,214,214,1) 50%, rgba(212,212,212,1) 74%, rgba(209,209,209,1) 100%);
background: -o-linear-gradient(left, rgba(254,254,254,1) 0%, rgba(219,219,219,1) 0%, rgba(214,214,214,1) 50%, rgba(212,212,212,1) 74%, rgba(209,209,209,1) 100%);
background: -ms-linear-gradient(left, rgba(254,254,254,1) 0%, rgba(219,219,219,1) 0%, rgba(214,214,214,1) 50%, rgba(212,212,212,1) 74%, rgba(209,209,209,1) 100%);
background: linear-gradient(to right, rgba(254,254,254,1) 0%, rgba(219,219,219,1) 0%, rgba(214,214,214,1) 50%, rgba(212,212,212,1) 74%, rgba(209,209,209,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fefefe', endColorstr='#d1d1d1', GradientType=1 );
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .verde h3{
                margin-left:20px;
                margin-top:20px;
                color:green;
                margin-left:-30%;
                font-size: 500%;
            }
            .rojo{
                margin-left:80%;
                color:red;
                width: 100%;
                font-size: 250%;
                margin-top:-20%;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">INICIO</a>
                    @else
                        <a href="{{ route('login') }}">Ingresar</a>

                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="verde">
                    <h3>
                        Policlinico
                    </h3>
                </div>

                <div class="rojo">
                    "Virgen de Copacabana"
                </div>
            </div>
        </div>
    </body>
</html>
