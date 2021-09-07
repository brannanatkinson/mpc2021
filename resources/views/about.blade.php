<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
        <div>
            <x-public-navigation/>
            <div class="bg-mp-blue-green py-8 text-white">
                <div class="container mx-auto ">
                    <div class="px-4 lg:w-2/3 mx-auto">
                        <div class="pt-8 pb-8 text-3xl font-display text-center">Thanks to Our Supporters</div>
                        <p class="text-xl text-center">The Mary Parrish Center is immensely grateful to the following people for their contributions to the success of Housing Hope 2021.</p>
                        <div class="flex flex-col justify-center lg:flex-row lg:flex-wrap">
                            <div class="lg:w-1/2 pb-8">
                                <p class="mt-6 mb-3 text-2xl text-mp-navy font-display text-center">Event Committee</p>
                                <ul class="text-center">
                                    <li class="inline-block text-2xl text-white mx-6">Tammy Kaminski, Chair</li>
                                    <li class="inline-block text-2xl text-white mx-6">Keri Adams</li>
                                    <li class="inline-block text-2xl text-white mx-6">Kate King</li>
                                    <li class="inline-block text-2xl text-white mx-6">Cyndi Lockyear</li>
                                    <li class="inline-block text-2xl text-white mx-6">Brittany Moon</li>
                                    <li class="inline-block text-2xl text-white mx-6">DenEllen Sutherland</li>
                                    <li class="inline-block text-2xl text-white mx-6">Jeff Teague</li>
                                    <li class="inline-block text-2xl text-white mx-6">Emily Waltenbaugh</li>
                                </ul>
                                <p class="mt-6 mb-3 text-2xl text-mp-navy font-display text-center">2021 Virtual Hosts</p>
                                <ul class="text-center">
                                    @foreach( App\Models\User::permission('edit host')->orderBy('name')->get() as $host   )
                                    <li class="inline-block text-2xl text-white mx-6">{{ $host->name}} </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="container mx-auto pb-8">
                <div class="pt-8 pb-4 text-4xl font-display text-center">Housing Hope 2021</div>
                <div class="px-4 w-full lg:w-3/5 mx-auto">
                    <p class="pb-6 text-xl text-center text-mp-blue-green font-display italic">Housing Hope raises funds to help victims of interpersonal violence escape their abusers, rebuild their lives and, ultimately, find permanent housing.</p>
                    <p class="pb-6 text-xl">The event is an online fundraiser featuring a Giving Catalog where donors pick from 16 gifts they want to give to current and future residents at The Mary Parrish Center. </p>
                    <p class="pb-6 text-xl">Residents who take the risk of leaving abusive situations often have only the clothes on their backs and what they can carry in their arms. Their abusers often still control their bank accounts, car leases, and other important parts of their lives. Even after escaping, survivors face ongoing harassment and stalking every single day. </p>
                    <p class="pb-6 text-xl">All Housing Hope 2021 gifts reflect goods and services that residents need to start a new life — for themselves and their families — free from abuse. All gifts are also 100 percent tax deductible.</p>
                </div>
            </div>
            
            
            <div class="container mx-auto pb-12">
                <div class="px-4 lg:w-3/5 mx-auto">
                    <div class="pt-8 pb-4 text-3xl font-display text-center">About The Mary Parrish Center</div>
                    <p class="mb-4 text-xl text-center text-mp-blue-green"><a href="https://www.maryparrish.org" >www.MaryParrish.org</a></p>
                    <p class="mb-6 text-xl">Since 2002, The Mary Parrish Center has provided a full array of no-cost, 
                    comprehensive services to over 7,000 survivors domestic violence, dating violence, sexual assault, stalking, and/or human trafficking.</p>
                    <p class="mb-6 text-xl">Our survivor-focused program enhances our residents’ autonomy by nurturing their capacity to live independently from their abusers, establish self-sufficiency, and secure permanent housing.</p>    
                </div>
            </div>
        </div>

    </body>
</html>
