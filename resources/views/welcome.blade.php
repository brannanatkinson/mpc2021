<x-public-layout>
    <main class="">
        <div class=" bg-mp-blue-green">
            <div class="lg:relative">
                <div class="mx-auto max-w-7xl w-full pt-16 pb-20 text-center lg:py-24 lg:text-left">
                    <div class="px-4 lg:w-2/5 sm:px-8 xl:pr-16">
                        <h1 class="mb-8 text-6xl text-white text-center font-display leading-none tracking-tight">
                            Housing Hope<br/> 
                            <span class="text-mp-light-lime">2022</span>
                        </h1>
                        @if ( getCurrentPeriod() == "before" )
                        <p class="mt-4 max-w-md mx-auto text-lg text-gray-100 sm:text-xl md:mt-8 md:max-w-3xl">
                            Housing Hope is coming Monday, September 12! The Mary Parrish Center looks forward to your participation again this year in this unique, important fundraiser to help surivors of interpersonal violence. Look for exciting updates and news soon.
                        </p>
                        @elseif ( getCurrentPeriod() == "during")
                        <p class="mt-4 max-w-md mx-auto text-lg text-gray-100 sm:text-xl md:mt-8 md:max-w-3xl">
                            Welcome to Housing Hope 2022, a unique online fundraiser benefitting survivors of interpersonal violence at The Mary Parrish Center.
                        </p>
                        @elseif ( getCurrentPeriod() == "after")
                        <p class="mt-4 max-w-md mx-auto text-lg text-gray-100 sm:text-xl md:mt-8 md:max-w-3xl">
                            Thank you to everyone who supported Housing Hope again this year. 
                            We are overwhelmed by the response and humbled by the support.
                        </p>
                        @endif
                        @if ( getCurrentPeriod() == "during")
                        <div class="mt-8">
                            <a href="/catalog" class="px-4 py-4 text-white border border-2 border-white rounded-full hover:bg-mp-light-lime hover:text-black">Shop the Giving Catalog</a>
                        </div>
                        @endif
                        <div class="clearfix"></div>
                   </div>
                </div>
                <div class="relative w-full h-64 sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:w-3/5 lg:h-full">
                    <img class="absolute inset-0 w-full h-full object-cover" src="{{ Storage::url('/photos/website/mpc_three_families.jpg')  }}" alt="Woman on her phone">
                </div>
            </div>
        </div>
        <!-- 
        ** Results
        -->
        @if ( getCurrentPeriod() == "during" )
        <div class="py-16">
        @livewire('results')
        </div>
        @endif

        @if ( getCurrentPeriod() == "after" )
        <div class="container py-16 max-w-5xl mx-auto">
            <div class="mt-8 mb-4 text-4xl font-display leading-tight text-mp-blue-green  text-center">
                Housing Hope 2022 Final Results
            </div>
            <div class="mb-8">
                 @livewire('results')
            </div>
            <p class="w-full mb-4 lg:mx-auto lg:max-w-4xl text-xl text-center px-6">
                Visit the <a href="/givingwall" class="text-mp-blue-green">Housing Hope Giving Wall</a> presented by Delek US to see donors and notes. 
            </p>
            <p class="mb-4 text-xl text-center">Follow The Mary Parrish Center on <a href="https://www.facebook.com/themaryparrishcenter/" class="text-mp-blue-green">Facebook</a> and <a href="https://www.instagram.com/themaryparrishcenter/" class="text-mp-blue-green">Instagram</a> to keep up with all the latest news.</p>
            
        </div>
        @endif

        <!-- 
        ** How to particpate
        -->
        @if ( getCurrentPeriod() == "during" )
        <div class="bg-mp-light-gray">
             <div class="container mx-auto py-16">
               
                <div class="mt-12 max-w-4xl mx-auto mb-8 px-6 md:px-0">
                    <div class="mb-4 text-5xl text-center text-mp-blue-green font-display">How to Participate in Housing Hope</div>
                    <p class="">The Mary Parrish Center depends on amazing donors to support our work. This unique online fundraiser features a fun <a href="/catalog" class="text-mp-blue-green hover:text-mp-coral">Giving Catalog</a> where you can select gifts that support the survivors of interpersonal violence and have the most meaning to you.</p>
                </div>
                <div class="mb-12 max-w-7xl mx-auto">
                    <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-8 px-6 lg:px-0">
                        <a href="/catalog">
                        <div class="bg-mp-light-lime p-8 space-y-4 rounded-md shadow-lg">
                            <div class="text-center"><i class="fad fa-gift fa-2x text-mp-navy"></i></div>
                            <div class="text-center text-2xl font-display font-bold">Shop The Giving Catalog</div>
                            <p class="text-xl">Browse the 16 Giving Catalog items that help survivors of interpersonal violence rebuild their lives and reclaim hope. Matching sponsors will double your gift for certain items.</p>
                            <div class="px-4 py-3 rounded-full border border-2 border-white text-center bg-mp-navy text-white">Shop The Giving Catalog</div>
                        </div>
                        </a>
                        <div class="bg-mp-navy p-8 space-y-4 rounded-md shadow-lg">
                            <div class="text-center"><i class="fad fa-shopping-cart fa-2x text-mp-coral"></i></div>
                            <div class="text-center text-2xl font-display font-bold text-white">Purchase A Gift</div>
                            <p class="text-xl text-white">Purchase a single item or multiple items. Every purchase is 100% tax-deductible.</p>
                            
                        </div>
                        <div class="bg-mp-blue-green p-8 space-y-4 rounded-md shadow-lg">
                            <div class="text-center"><i class="fad fa-envelope-open fa-2x text-mp-light-gray"></i></div>
                            <div class="text-center text-2xl font-display font-bold text-mp-light-gray">Share</div>
                            <p class="text-xl text-mp-light-gray">Add your name to the Donor Wall and write a note of support, if you would like. Of course, we hope you share your gift on social media.</p>
                        </div>
                    </div>
                    <div class="mb-4 text-2xl text-center font-display text-mp-blue-green">
                        Follow The Mary Parrish Center
                    </div>
                    <div class="flex flex-row justify-center space-x-10">
                        <a href="https://www.facebook.com/themaryparrishcenter" target="_blank"><i class="fa fa-facebook fa-2x text-mp-blue-green"></i></a>
                        <a href="https://www.instagram.com/themaryparrishcenter/" target="_blank"><i class="fa fa-instagram fa-2x text-mp-blue-green"></i></a>
                        <a href="https://twitter.com/MaryParrishCntr" target="_blank"><i class="fa fa-twitter fa-2x text-mp-blue-green"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- 
        ** Stat
        -->
        <div class="bg-mp-blue-green">
            <div class="pt-16 pb-20 flex flex-col items-center justify-center">
                <p class="mb-6 lg:mb-12 text-white lg:text-xl text-center uppercase">Why The Mary Parrish Center needs your support</p>
                <div class="hidden md:block mb-8">
                     <iframe src="{{ url('https://www.youtube.com/embed/bFr-Fk6aBmQ') }}" width="750" height="423" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="block md:hidden mb-8 ">
                     <iframe src="{{ url('https://www.youtube.com/embed/bFr-Fk6aBmQ') }}" width="400" height="225" frameborder="0" allowfullscreen></iframe>
                </div>
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
        <!-- 
        ** Sponsor
        -->
        @if ( getCurrentPeriod() == "before " ) 
        <div class="py-12 bg-mp-light-lime">
            <div class="container mx-auto text-center text-2xl font-display text-mp-navy">
                <span class="font-bold">Want to sponsor Housing Hope or become an event host?</span> <a class="underline hover:text-black" href="mailto:merrill@maryparrish.org">Email Merrick Cope</a> today for more information.
            </div>
        </div>
        @endif

        @if ( getCurrentPeriod() == "after" ) 
        <div class="bg-white">
            <div class="my-12 text-4xl text-mp-blue-green text-center font-display">2022 Housing Hope Sponsors</div>
            @livewire('sponsor-grid')
        </div>
        @endif

        <!-- 
        ** About MPC
        -->
        <div id="mpc" class="bg-mp-coral py-16">
            <div class="container mx-auto px-4 lg:px-0">
                <img src="{{ Storage::url('/logos/20years-final-horizontal-rgb.png') }}" class="mx-auto w-96 mb-8" alt="">
                <div class="mb-4 text-3xl lg:text-4xl text-center text-navy font-display italic leading-tight">About The Mary Parrish Center</div>
                <p class="mb-12 max-w-4xl mx-auto text-xl lg:text-2xl text-white text-center leading-tight">The Mary Parrish Center provides vital services that help survivors through <b>the stages of
                            rebuilding</b> their lives following interpersonal violence.</p>
                <div class="mx-auto p-6 grid gap-6 lg:gap-12 max-w-4xl lg:p-0 lg:grid-cols-3">
                    <div class="px-3 py-4 bg-mp-navy rounded shadow-lg">
                        <div class="my-6 text-center text-2xl text-mp-coral font-display italic">Gain independence from abusers</div>
                        <p class="mb-4 text-white text-center">We provide transitional housing to survivors of interpersonal violence including domestic violence, dating violence, sexual assault, stalking, and/or human trafficking.</p>
                    </div>
                    <div class="px-3 py-4 bg-white rounded shadow-lg">
                        <div class="my-6 text-center text-2xl text-mp-coral font-display italic">Become self-sufficient</div>
                        <p class="mb-4 text-mp-navy text-center">We help survivors rebuild their lives through a wide range of flexible and optional 
                        support services, including clinical therapy, emergency financial assistance, housing advocacy, enrichment activities, case management and financial advocacy.</p>
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
    </main>
</x-public-layout>
