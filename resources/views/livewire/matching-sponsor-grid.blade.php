<div class="mb-8 text-3xl text-center font-display text-mp-blue-green">Matching Sponsors</div>
<div class="container mb-16  px-6 md:px-0 mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
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
    @foreach( $MatchingSponsors as $sponsor )
    <div class="p-3 bg-white border border-2 shadow-lg">
        <div class="flex flex-col p-4 items-center">
            <div class="mb-4"><i class="fa fa-trophy"></i></div>
            <div class="text-center mb-6">
                {{ App\Models\Item::where('sponsor_id', '=', $sponsor->id )->first()->name }}
            </div>
            <div class="my-4 flex-grow">
                <div class="flex flex-col h-full justify-center">
                    @if( $sponsor->img )
                        <img src="{{ Storage::url( $sponsor->img ) }}" class="h-36 object-contain"alt="">
                    @else
                        <span class="text-3xl">{{ $sponsor->name }}</span>
                    @endif
                    
                </div>
            </div>
            @php
                $sponsorTotal = $sponsor->matchTotal()->first()->total;
                if( $sponsorTotal != 0 ){
                    $matchProgress = $sponsor->amount / $sponsorTotal;
                } else {
                    $matchProgress = 0;
                }
                
            @endphp
            
            <div class="justify-self-end w-full py-4">
                <div class="mb-2 text-sm text-center">Match Progress - {{ number_format( $sponsor->matchProgress(), 0) }}%</div>
                <div class="overflow-hidden h-4 mb-4 text-xs flex rounded-full bg-gray-200">
                     <div style="width:{{ $sponsor->matchProgress() }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-mp-blue-green"></div>
                </div>
            </div>
            @if( $showOnPage == 1)
            <div><a href="/catalog/item/{{ App\Models\Item::where('sponsor_id', '=', $sponsor->id)->first()->id }}"><button class="py-3 px-4 bg-mp-blue-green text-white">Buy This Item</button></a></div>
            @endif
        </div>
    </div>
    @endforeach
</div>