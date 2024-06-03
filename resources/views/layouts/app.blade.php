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

<body class="white">

    {{-- forma 1 --}}
    {{-- @livewire('navigation-menu') 
            <div class="flex h-full">
                <div class="hidden sm:block md:block lg:block">
                    @livewire('menu-column')
                </div>
                <!-- Contenido de la columna izquierda -->
                <div class="right-section flex flex-grow p-8 max-w-full bg-gray-200 justify-center "> <!-- Aplica overflow-auto aquí -->
                    @yield('content-main')
                </div>
            </div> --}}

    {{-- forma2   --}}
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


    {{-- forma3  --}}
    {{-- <div>
                @livewire('navigation-menu') 
            </div>
            <div class="min-h-screen bg-gray-100 flex">
                <div class="hidden sm:block md:block lg:block">
                    @livewire('menu-column')
                </div>
                <section class="flex p-8 overflow-auto max-w-full bg-gray-200 h-screen w-full  justify-center">
                        @yield('content-main')
                </section> 
            </div> --}}

    @stack('modals')
    @livewireScripts
</body>

</html>
