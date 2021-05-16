<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/images/insignia/logo.png">
    <title>@yield('titulo')</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="/painel/css/simplebar.css">
    <!-- Fonts CSS -->

    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="/painel/css/feather.css">
    <link rel="stylesheet" href="/painel/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/painel/css/style.css">
    <link rel="stylesheet" href="/painel/css/select2.css">
    <link rel="stylesheet" href="/painel/css/dropzone.css">
    <link rel="stylesheet" href="/painel/css/uppy.min.css">
    <link rel="stylesheet" href="/painel/css/jquery.steps.css">
    <link rel="stylesheet" href="/painel/css/jquery.timepicker.css">
    <link rel="stylesheet" href="/painel/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="/painel/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="/painel/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="/painel/css/app-dark.css" id="darkTheme" disabled>

    <link rel="stylesheet" href="css/sweetalert.css">

    {{--  --}}
</head>

<body class="vertical light">
    <div class="wrapper">
