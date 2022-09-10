<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>About Housing Hope - A fundraiser for The Mary Parrish Center</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.snipcart.com/themes/v3.2.0/default/snipcart.css" />
        <link rel="preconnect" href="https://app.snipcart.com">
        <link rel="preconnect" href="https://cdn.snipcart.com">

        <!-- Scripts  -->
        <script src="https://kit.fontawesome.com/29c2ffedae.js" crossorigin="anonymous"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div>
            <x-public-navigation/>
            <div class="aspect-w-16 aspect-h-5 ">
                <img src="{{ Storage::url('photos/website/livingroom1.jpg') }}" alt="" class="object-cover">
            </div>
            
            
            <div class="container mx-auto pb-8">
                <div class="pt-8 pb-4 text-4xl font-display text-center">Housing Hope 2022</div>
                <div class="px-4 w-full lg:w-3/5 mx-auto">
                    <p class="pb-6 text-xl text-center text-mp-blue-green font-display italic">Housing Hope raises funds to help survivors of interpersonal violence escape their abusers, rebuild their lives and, ultimately, find permanent housing.</p>
                    <p class="pb-6 text-xl">The event is an online fundraiser featuring a Giving Catalog where donors pick from 16 gifts they want to give to current and future residents at The Mary Parrish Center. </p>
                    <p class="pb-6 text-xl">Residents who take the risk of leaving abusive situations often have only the clothes on their backs and what they can carry in their arms. Their abusers often still control their bank accounts, car leases, and other important parts of their lives. Even after escaping, survivors face ongoing harassment and stalking every single day. </p>
                    <p class="pb-6 text-xl">All Housing Hope gifts reflect goods and services that residents need to start a new life — for themselves and their families — free from abuse. All gifts are also 100 percent tax deductible.</p>
                </div>
            </div>
            <div class="bg-mp-blue-green py-8 text-white">
                <div class="container mx-auto ">
                    <div class="px-4 mx-auto">
                        <div class="pt-8 pb-8 text-3xl font-display text-center">Thanks to Our Supporters</div>
                        <p class="text-xl text-center">The Mary Parrish Center is immensely grateful to the following people for their contributions to the success of Housing Hope 2022.</p>
                        <div class="flex flex-col justify-center lg:flex-row lg:flex-wrap">
                            <div class="pb-8">
                                <!-- <p class="mt-6 mb-3 text-2xl text-mp-navy font-display text-center">Event Committee</p>
                                <ul class="flex flex-col md:flex-row flex-wrap justify-center">
                                    <li class="w-full md:w-1/4 text-center text-2xl text-white">Tammy Kaminski, Chair</li>
                                    <li class="w-full md:w-1/4 text-center text-2xl text-white">Keri Adams</li>
                                    <li class="w-full md:w-1/4 text-center text-2xl text-white">Kate King</li>
                                    <li class="w-full md:w-1/4 text-center text-2xl text-white">Cyndi Lockyear</li>
                                    <li class="w-full md:w-1/4 text-center text-2xl text-white">Brittany Moon</li>
                                    <li class="w-full md:w-1/4 text-center text-2xl text-white">DenEllen Sutherland</li>
                                    <li class="w-full md:w-1/4 text-center text-2xl text-white">Jeff Teague</li>
                                    <li class="w-full md:w-1/4 text-center text-2xl text-white">Emily Waltenbaugh</li>
                                </ul> -->
                                <p class="mt-6 mb-3 text-2xl text-mp-navy font-display text-center">2022 Events Hosts</p>
                                <ul class="flex flex-col md:flex-row flex-wrap justify-center">
                                    @foreach( App\Models\User::permission('edit host')->orderBy('name')->get() as $host   )
                                    <li class="w-full md:w-1/4 text-center text-2xl text-white">{{ $host->name}} </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            
            <div class="container mx-auto pb-12">
                <div class="px-4 lg:w-3/5 mx-auto">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="{{ Storage::url('photos/website/mpc_moms_talking.jpg') }}" alt="" class="object-cover">
                    </div>
                    <div class="pt-12">
                        <img src="{{ Storage::url('/logos/20years-final-vertical-rgb.png') }}" class="mx-auto w-64 mb-8" alt="">
                    </div>
                    <div class="pt-4 pb-4 text-3xl font-display text-center">About The Mary Parrish Center</div>
                    <p class="mb-4 text-xl text-center text-mp-blue-green"><a href="https://www.maryparrish.org" >www.MaryParrish.org</a></p>
                    <p class="mb-6 text-xl">Since 2002, The Mary Parrish Center has provided a full array of no-cost, 
                    comprehensive services to over 7,000 survivors of interpersonal violence including domestic violence, dating violence, sexual assault, stalking, and/or human trafficking.</p>
                    <p class="mb-6 text-xl">Our survivor-focused program enhances our residents’ autonomy by nurturing their capacity to live independently from their abusers, establish self-sufficiency, and secure permanent housing.</p>    
                </div>
            </div>
        </div>
        @if ( getCurrentPeriod() == "during" )
        <div class="mb-16 max-w-4xl mx-auto">
            <div class="mb-8 text-3xl font-display text-center">Frequently Asked Questions</div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 px-6 lg:px-0">
                <div>
                    <div class="mb-4 text-2xl font-display text-mp-blue-green italic">
                        Is my gift anonymous? 
                    </div>
                    <div class="text-xl">
                        Yes, of course. The Mary Parrish Center respects your privacy. That said, if you give us permission, we will share your name on the Housing Hope 2021 Giving Wall
                    </div>
                </div>
                <div>
                    <div class="mb-4 text-2xl font-display text-mp-blue-green italic">
                        Can give multiple gifts? 
                    </div>
                    <div class="text-xl">
                        Of course. The gift catalog functions like any online store. You can select multiple items and even multiple quantities of items.
                    </div>
                </div>
                <div>
                    <div class="mb-4 text-2xl font-display text-mp-blue-green italic">
                        Can make a donation without purchasing a gift? 
                    </div>
                    <div class="text-xl">
                       Yes, you can. You can make a one-time or recuring donation on The Mary Parrish Center website at www.maryparrish.org/donate
                    </div>
                </div>
                <div>
                    <div class="mb-4 text-2xl font-display text-mp-blue-green italic">
                        Are purchases secure? 
                    </div>
                    <div class="text-xl">
                        Yes. Purchases are processed though Stripe, reputable payment processor. The Mary Parrish Center does not have access to or store your credit card number.
                    </div>
                </div>
                <div>
                    <div class="mb-4 text-2xl font-display text-mp-blue-green italic">
                        How did The Mary Parrish Center choose the gifts in the catalog? 
                    </div>
                    <div class="text-xl">
                        Each gift is product and service that The Mary Parrish Center clients need every day to build self-sufficiency and begin restoring normalcy their lives. Each gift helps residents feel ownership over their new lives.
                    </div>
                </div>
                <div>
                    <div class="mb-4 text-2xl font-display text-mp-blue-green italic">
                        Will The Mary Parrish Center spend donations for selected gifts? 
                    </div>
                    <div class="text-xl">
                        As mentioned, the gifts are products and services The Mary Parrish Center clients need every day. The staff will make every effort to honor the spirit of every gift given during Housing Hope 2021. The Mary Parrish Center will spend 100% of proceeds directly helping residents. Our top priority is fulfilling the current needs of clients. We reserve the right to use donations for clients* immediate needs and priorities.
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="py-12 bg-mp-navy text-white text-sm text-center">Housing Hope Nashville - &copy; 2021 The Mary Parrish Center - Photo Credit: Peyton Hoge - Website Development: Amy Atkinson Communications</div>
        <script async src="https://cdn.snipcart.com/themes/v3.2.1/default/snipcart.js"></script>
        <div hidden id="snipcart" data-api-key="{{ env('SNIPCART_KEY') }}"></div>
    </body>
</html>
