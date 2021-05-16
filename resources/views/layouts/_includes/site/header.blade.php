<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title>@yield('titulo')</title>
    <link rel="icon" href="/images/insignia/logo.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="/site/css/flexslider.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/line-icons.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/elegant-icons.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/theme-aquatica.css" rel="stylesheet" type="text/css" media="all" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700%7CRaleway:700'
        rel='stylesheet' type='text/css'>
    <script src="/site/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    {{-- Minhas estilizações --}}
    <link href="/site/css/mystyle.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="/slick/slick.css" />
    {{-- <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> --}}


</head>

<body>
    <div class="loader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <div class="nav-container">

        <nav class="top-bar">
            <div class="container">
                <div class="row nav-menu">
                    <div class="col-sm-3 col-md-2 columns pb-create-2">
                        <a href="{{ url('/') }}">
                            <img class="logo logo-light" alt="Logo" src="/images/insignia/logo.png">
                            <img class="logo logo-dark" alt="Logo" src="/images/insignia/logo.png">
                        </a>
                    </div>

                    <div class="col-sm-9 col-md-10 columns">
                        <ul class="menu">
                            <li><a href="#"> </a></li>
                            
                            <li><a href="{{ route('site.anos-escolaridade') }}">Anos de escolaridade</a></li>
                            <li><a href="{{ route('site.manuais-escolares') }}">Manuais Escolares</a></li>
                          
                            <li class="has-dropdown"><a href="#">Horários</a>
                                <ul class="subnav">
                                    <li><a href="{{ route('site.horarios-basico') }}">Ensino Primário</a></li>
                                    <li><a href="{{ route('site.horarios-secundario') }}">Ens.Secundário</a></li>
                                </ul>
                            </li>
                
                            <li><a href="{{ route('site.sobre') }}">Sobre</a></li>
                            @empty(Auth::user()->vc_tipoUtilizador)
                                <li><a href="{{ route('login') }}">Entrar</a></li>
                            @else
                                <li><a href="{{ route('home') }}"><b class="text-success">Painel</b></a></li>
                            @endempty
                        </ul>
                        

                    </div>
                </div>
                <!--end of row-->

                <div class="mobile-toggle">
                    <i class="icon icon_menu"></i>
                </div>

            </div>
            <!--end of container-->
        </nav>
    </div>
