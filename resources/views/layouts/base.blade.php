<!DOCTYPE html>
<html lang="{{ str_replace( '_', '-', app()->getLocale() ) }} ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @hasSection ('title')
        <title>@yield('title') - {{ config('app.name') }}</title>      
    @else
        <title>{{ config('app.name') }} </title>         
    @endif

    {{-- Style --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">   

    @livewireStyles
</head>
<body class="bg-gray-50">
    
    @yield('body')
    
    
    @yield('js')    
    @livewireScripts
</body>
</html>