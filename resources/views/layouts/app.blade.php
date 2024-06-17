<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href={{ asset('img/logo.ico') }}>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylsheet" href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
</head>


<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div  class="w-full"  style="position: fixed; z-index: 20;">
            @livewire('navigation-menu')
        </div>
        <div class="min-h-screen bg-gray-100 flex pt-16">
            <main class="p-8 flex overflow-auto max-w-full w-full justify-center">
                {{ $slot }}
            </main>
        </div>
        @stack('modals')
        @livewireScripts
</body>
</html>
