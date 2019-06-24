<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Ingresar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
<style media="screen">
    html, body{
        background: rgba(254,254,254,1);
background: -moz-linear-gradient(left, rgba(254,254,254,1) 0%, rgba(219,219,219,1) 0%, rgba(214,214,214,1) 50%, rgba(212,212,212,1) 74%, rgba(209,209,209,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(254,254,254,1)), color-stop(0%, rgba(219,219,219,1)), color-stop(50%, rgba(214,214,214,1)), color-stop(74%, rgba(212,212,212,1)), color-stop(100%, rgba(209,209,209,1)));
background: -webkit-linear-gradient(left, rgba(254,254,254,1) 0%, rgba(219,219,219,1) 0%, rgba(214,214,214,1) 50%, rgba(212,212,212,1) 74%, rgba(209,209,209,1) 100%);
background: -o-linear-gradient(left, rgba(254,254,254,1) 0%, rgba(219,219,219,1) 0%, rgba(214,214,214,1) 50%, rgba(212,212,212,1) 74%, rgba(209,209,209,1) 100%);
background: -ms-linear-gradient(left, rgba(254,254,254,1) 0%, rgba(219,219,219,1) 0%, rgba(214,214,214,1) 50%, rgba(212,212,212,1) 74%, rgba(209,209,209,1) 100%);
background: linear-gradient(to right, rgba(254,254,254,1) 0%, rgba(219,219,219,1) 0%, rgba(214,214,214,1) 50%, rgba(212,212,212,1) 74%, rgba(209,209,209,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fefefe', endColorstr='#d1d1d1', GradientType=1 );
    }
</style>
</html>
