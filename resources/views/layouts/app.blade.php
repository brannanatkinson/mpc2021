<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>{{ $title ?? 'The Mary Parrish Center' }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://cdn.snipcart.com/themes/v3.2.0/default/snipcart.css" />

        @livewireStyles

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/29c2ffedae.js" crossorigin="anonymous"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        
        <link rel="preconnect" href="https://app.snipcart.com">
        <link rel="preconnect" href="https://cdn.snipcart.com">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173249724-2"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-173249724-2');
        </script>

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="mt-8">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <div class="py-12 bg-mp-navy text-white text-sm text-center">Housing Hope Nashville - &copy; 2021 The Mary Parrish Center - Photo Credit: Peyton Hoge - Website 
        <script async src="https://cdn.snipcart.com/themes/v3.2.0/default/snipcart.js"></script>
        <div hidden id="snipcart" data-api-key="{{ env('SNIPCART_KEY') }}"></div>
        <script src="//unpkg.com/alpinejs" defer></script>
    </body>
</html>
