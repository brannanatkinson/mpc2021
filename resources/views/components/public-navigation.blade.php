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
    <div class="max-w-7xl mx-auto mt-4 mb-12">
        <ul class="flex items-center list-type-none text-mp-blue-green">
            <li class="inline-block mr-8">
                <a href="/">
                    <img src="{{ Storage::url('/logos/housing_hope_stacked.png')}}" class="w-64" alt="">
                </a>
            </li>
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
            <li class="inline-block">The Mary Parrish Center</li>
        </ul>
    </div>
</div>