<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
{{-- 
<body class="white">
    <div class="w-full"  style="position: fixed; z-index: 20;">
        <!-- Aquí está la navegación, asumiendo que está en un componente de Livewire -->
        @livewire('navigation-menu')
    </div>
    <div class="min-h-screen bg-gray-100 flex pt-16">
            <section class="flex p-8 overflow-auto max-w-full w-full justify-center">
                @yield('content-main')
            </section>
        </div>
    </div>

    @stack('modals')
    @livewireScripts
</body> --}}

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        {{-- @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif --}}
        <!-- Page Content -->
        <div class="min-h-screen bg-gray-100 flex pt-16">
            <main class="flex overflow-auto max-w-full w-full justify-center">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
</body>

</html>
