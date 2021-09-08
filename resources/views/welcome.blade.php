<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to Housing Hope - A fundraiser for The Mary Parrish Center</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
   
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts  -->
        <script src="https://kit.fontawesome.com/29c2ffedae.js" crossorigin="anonymous"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <x-public-navigation/>
        @php
            $userTimezone = new DateTimeZone('America/Chicago');
            $gmtTimezone = new DateTimeZone('GMT');
            $myDateTime = new DateTime( date('Y-m-d H:i:s'), $gmtTimezone);
            $offset = $userTimezone->getOffset($myDateTime);
            $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
            $myDateTime->add($myInterval);
            $result = $myDateTime->format('Y-m-d H:i:s');
            $showOnPage = $result > date( env('START_DATE') );
        @endphp
        <div class="relative bg-mp-blue-green">
            <main class="lg:relative">
                <div class="mx-auto max-w-7xl w-full pt-16 pb-20 text-center lg:py-24 lg:text-left">
                    <div class="px-4 lg:w-2/5 sm:px-8 xl:pr-16">
                        <h1 class="mb-8 text-6xl text-white text-center font-display leading-none tracking-tight">
                            Housing Hope<br/> 
                            <span class="text-mp-light-lime">2021</span>
                        </h1>
                        <p class="mb-6 text-white text-center uppercase tracking-wide">A unique online fundraiser to help survivors of interpersonal violence</p>
                        <p class="mt-4 max-w-md mx-auto text-lg text-gray-100 sm:text-xl md:mt-8 md:max-w-3xl">
                            The Housing Hope virtual fundraiser will return again this year. 
                            We hope that everyone who helped make Housing Hope a huge success in 2020 will participate again this year. 
                        </p>
                        @if ( $showOnPage == 1 )
                        <div class="mt-8">
                            <a href="/catalog" class="px-4 py-4 text-white border border-2 border-white rounded-full hover:bg-mp-light-lime hover:text-black">Shop the Giving Catalog</a>
                        </div>
                        @endif
                        <div class="clearfix"></div>
                   </div>
                </div>
                <div class="relative w-full h-64 sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:w-3/5 lg:h-full">
                    <img class="absolute inset-0 w-full h-full object-cover" src="{{ Storage::url('/photos/website/mpc_reading.jpeg')  }}" alt="Woman on her phone">
                </div>
            </main>
        </div>

        <div class="container mb-12 mx-auto">
        @if ( $showOnPage == 1 )
          <div class="mt-8 mb-4 text-4xl font-display leading-tight text-mp-blue-green  text-center">Housing Hope 2021 Results</div>
          <div class="mb-8">
               @livewire('results')
          </div>
          <p class="w-full mb-4 lg:mx-auto lg:max-w-4xl text-xl text-center px-6">
            Visit the <a href="/givingwall" class="text-mp-blue-green">Housing Hope Giving Wall</a> presented by Pinnacle to see donors and notes. 
          </p>
        @else
        <div class="py-16 max-w-5xl mx-auto">
            <div class="mb-6 text-5xl font-display text-mp-blue-green text-center">Housing Hope Returns Next Monday</div>
            <p class="mb-4 text-xl">Housing Hope will take place Monday, September 13, through Friday, September 17. We look forward to your participation and another record-breaking event raising money to support the survivors of interpersonal violence.</p>
            <p class="mb-4 text-xl">This year's event will feature the <b>Giving Catalog presented by HCA/Tristar Health</b>, where you will be able to select from 16 gifts for The Mary Parrish Center residents, and the <b>Giving Wall presesnted by Pinnacle Financial Partners</b>.</p>
            <p class="mb-4 text-xl">Follow The Mary Parrish Center on <a href="https://www.facebook.com/themaryparrishcenter/" class="text-mp-blue-green">Facebook</a> and <a href="https://www.instagram.com/themaryparrishcenter/" class="text-mp-blue-green">Instagram</a> to keep up with all the latest news.</p>
            <div class="grid lg:grid-cols-2">
                <div class="flex justify-center p-8">
                    <img src="{{ Storage::url('/logos/giving_catalog_banner.jpg') }}" alt="">
                </div>
                <div class="flex justify-center p-8">
                    <img src="{{ Storage::url('/logos/giving_wall_banner.jpg') }}" alt="">
                </div>
            </div>
        </div>
        @endif
        </div>
        <!-- stat  -->
        <div class="bg-mp-blue-green">
            <div class="pt-16 pb-20 flex flex-col items-center justify-center">
                <p class="mb-6 lg:mb-12 text-white lg:text-xl text-center uppercase">Why The Mary Parrish Center needs your support</p>
                <div class="w-3/5 text-3xl lg:text-5xl text-mp-light-lime text-center leading-none font-display">
                    Domestic violence is 
                    <span class="text-white italic">a leading cause of homelessness</span> 
                    for women and their children in the United States.
                </div>
                <p class="mt-8 text-white text-center">
                    National Network to End Domestic Violence
                </p>
                <div class="video">
                
                </div>
                
            </div>
        </div>

        <!-- Sponsor  -->
            <div class="bg-white">
                <div class="my-12 text-4xl text-mp-blue-green text-center font-display">2021 Housing Hope Sponsors</div>
                @livewire('sponsor-grid')
            </div>

        <div id="mpc" class="bg-mp-coral py-16">
            <div class="container mx-auto px-4 lg:px-0">
                <img src="/logos/mp_green_logo.png" class="mx-auto w-64 mb-8" alt="">
                <div class="mb-4 text-3xl lg:text-4xl text-center text-navy font-display italic leading-tight">About The Mary Parrish Center</div>
                <p class="mb-12 max-w-4xl mx-auto text-xl lg:text-2xl text-white text-center leading-tight">The Mary Parrish Center provides vital services that help survivors through <b>the stages of
                            rebuilding</b> their lives following interpersonal violence.</p>
                <div class="mx-auto p-6 grid gap-6 lg:gap-12 max-w-4xl lg:p-0 lg:grid-cols-3">
                    <div class="px-3 py-4 bg-mp-navy rounded shadow-lg">
                        <div class="my-6 text-center text-2xl text-mp-coral font-display italic">Gain independence from abusers</div>
                        <p class="mb-4 text-white text-center">We provide transitional housing for survivors 
                        domestic violence, dating violence, sexual assault, stalking, and/or human trafficking.</p>
                    </div>
                    <div class="px-3 py-4 bg-white rounded shadow-lg">
                        <div class="my-6 text-center text-2xl text-mp-coral font-display italic">Become self-sufficient</div>
                        <p class="mb-4 text-mp-navy text-center">We help survivors rebuild their lives through a wide range of flexible and optional 
                        support services including clinical therapy, emergency financial assistance, housing advocacy, enrichment activities and case management.</p>
                    </div>
                    <div class="px-3 py-4 bg-mp-navy rounded shadow-lg">
                        <div class="my-6 text-center text-2xl text-mp-coral font-display italic">Secure permanent housing</div>
                        <p class="mb-4 text-white text-center">We assist survivors in finding permanent housing for themselves and their families.</p>
                    </div>
                </div>
                <div class="text-center">
                    <a href="https://www.maryparrish.org" target="_blank"><button class="mt-12 px-4 py-4 border-2 border-solid hover:border-white hover:bg-white border-mp-navy text-xl text-mp-navy hover:text-mp-coral rounded">Visit our website for more information</button></a>
                </div>
            </div>
        </div>

    </body>
</html>
