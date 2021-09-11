<div>
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
   
    <!-- 
    * mobile
    -->

    <div x-data="{ isOpen: false }" class="max-w-7xl mx-auto flex flex-col items-center md:flex-row py-8 bg-white">
        <div class="">
            <a href="/"><img src="{{ Storage::url('/logos/housing_hope_stacked.png')}}" class="w-64 md:mr-8" alt=""></a>
        </div>
        <!-- left header section -->
        <div class="flex items-center ">
            <div>
                <button @click="isOpen = !isOpen" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10  md:hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <div class="hidden space-x-6 lg:inline-block">
                <ul class="list-type-none text-mp-blue-green">
                   
                    @if ( $showOnPage == 1 )
                    <li class="inline-block mr-8">
                        <a href="/catalog">Giving Catalog</a>
                    </li>
                    <li class="inline-block mr-8">
                        <a href="/givingwall">Giving Wall</a>
                    </li>
                    @endif
                    <li class="inline-block mr-8">
                        <a href="/sponsors">Sponsors</a>
                    </li>
                    <li class="inline-block mr-8">
                        <a href="/about">About Housing Hope</a>
                    </li>
                    <li class="inline-block">
                        <a href="https://maryparrish.org">The Mary Parrish Center</a>
                    </li>
                </ul>
            </div>

            <!-- mobile navbar -->
            <div class="mobile-navbar">
                <!-- navbar wrapper -->
                <div class="fixed left-0 w-full h-64 p-5 bg-white rounded-lg shadow-xl top-40 z-50" x-show="isOpen"
                    @click.away=" isOpen = false">
                    <div class="flex flex-col space-y-6">
                        <a href="/catalog" class="text-sm text-black">Giving Catalog</a>
                        <a href="/givingwall" class="text-sm text-black">Giving Wall</a>
                        <a href="/sponsors" class="text-sm text-black">Sponsors</a>
                        <a href="/about" class="text-sm text-black">About Housing Hope</a>
                        <a href="https://maryparrish.org" class="text-sm text-black">The Mary Parrish Center</a>
                    </div>
                </div>
            </div>
            <!-- end mobile navbar -->
        </div>
        <!-- right header section -->

    </div>
</div>