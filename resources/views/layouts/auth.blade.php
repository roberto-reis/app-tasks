@extends('layouts.base')

@section('body')

    <div class="w-screen min-h-screen bg-gradient-to-r from-gray-400 to-blue-600">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>


@endsection