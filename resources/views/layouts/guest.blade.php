<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

         <title>{{ $title ?? 'The Mary Parrish Center' }} - Housing Hope 2021</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.snipcart.com/themes/v3.2.0/default/snipcart.css" />
        <link rel="preconnect" href="https://app.snipcart.com">
        <link rel="preconnect" href="https://cdn.snipcart.com">
        @livewireStyles

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/29c2ffedae.js" crossorigin="anonymous"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        @livewireScripts
        <script async src="https://cdn.snipcart.com/themes/v3.2.1/default/snipcart.js"></script>
        <div hidden id="snipcart" data-api-key="{{ env('SNIPCART_KEY') }}"></div>
        <script>
            document.addEventListener('snipcart.ready', () => {
              Snipcart.events.on('cart.confirmed', (cartConfirmResponse) => {
                setTimeout(function(){
                    var url = '/thankyou/' + cartConfirmResponse.token;
                    window.location.href = url;
                }, 3000);
              });
            });
        </script>
    </body>
</html>
