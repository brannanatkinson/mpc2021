<x-public-navigation/>
@php
    $userTimezone = new DateTimeZone('America/Chicago');
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime( date('Y-m-d H:i:s'), $gmtTimezone);
    $offset = $userTimezone->getOffset($myDateTime);
    $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
    $myDateTime->add($myInterval);
    $result = $myDateTime->format('Y-m-d H:i:s');
    $showOnPage = $result < date( env('END_DATE') );
@endphp

@php
    $hostNames = '--|';
    $hosts = App\Models\User::permission('edit host')->orderBy('name')->get();
    $lastElement = $hosts->last();
    foreach ( $hosts as $host ) {
        if ( $lastElement->name == $host->name ){
            $hostNames .= $host->name;
        }
        else {
            $hostNames .= $host->name . '|';
        }
    }
    if(Session::has('host')) {
        $hostToCredit = Session::get('host') ;
    }
    else {
        $hostToCredit = '--';
    }
@endphp
@if ( $showOnPage == 0)
<div class="py-6 mb-6 text-center font-display bg-mp-light-lime text-mp-navy">Housing Hope 2021 has ended. Thank you for supporting The Mary Parrish Center.</div>
@endif
<div class="container mx-auto">
    <div class="container mx-auto px-8 lg:px-0">
        <!-- gift listing  -->
        <div class="flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/2">
                <img class="w-full bg-yellow-300 object-contain " src="{{ Storage::url( $CatalogItem->img ) }}">
            </div>
            <div class="w-full lg:px-16 lg:w-1/2 ">
                <div class="mb-6 lg:mt-0 text-4xl font-bold font-display leading-none">{{ $CatalogItem->name }}</div>
                <!-- pricing  -->
                <div class="mb-6 flex flex-row items-baseline">
                    @if( $CatalogItem->sponsor_id != null AND $CatalogItem->sponsor->hasAvailableMatch() == true )
                    <div class="text-sm"><i class="fa fa-trophy text-mp-light-lime"></i> <spon class="text-mp-navy">Your gift will be matched by {{ $CatalogItem->sponsor->name }}</spon></div>
                    @endif
                </div>
                <div class="mb-6 text-3xl">
                    ${{ $CatalogItem->cost }}
                </div>
                @if( $showOnPage == 1 )
                <button class="snipcart-add-item px-4 py-3 bg-mp-blue-green text-white"
                    data-item-id="{{ $CatalogItem->name}}"
                    data-item-price="{{ $CatalogItem->cost }}"
                    data-item-url="/catalog/item/{{ $CatalogItem->id }}"
                    data-item-description="{{ $CatalogItem->excerpt }}"
                    data-item-name="{{ $CatalogItem->name }}"
                    data-item-custom1-name="Credit your virtual host"
                    data-item-custom1-options="@php echo $hostNames @endphp"
                    data-item-custom1-value="@php echo $hostToCredit @endphp">
                    Add to cart
                </button>
                @endif
                <p class="mt-6 text-lg leading-snug">{{ $CatalogItem->description }}</p>
                <!-- 
                *   determine how to do bullets
                -->
                <ul class="mt-4 list-disc ml-8 text-mp-blue-green">
                    @if( $CatalogItem->sponsor_id != null AND $CatalogItem->sponsor->hasAvailableMatch() )
                        <li>Double your gift with match</li>
                    @endif  
                        <li>Gift is 100% tax-deductible</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@if( $CatalogItem->sponsor_id != null  )
<div class="mt-8 max-w-5xl mx-auto px-6 md:px-0">
    <div class="flex flex-col md:flex-row items-center p-8 bg-white border border-2 shadow-lg">
        <div class="w-full md:w-1/3">
            <img src="{{ Storage::url( $CatalogItem->sponsor->img ) }}" class="h-48 object-contain" alt="">
        </div>
        <div class="w-full md:w-2/3 px-12">
            <div class="mb-4 text-center">
                <i class="fa fa-trophy text-mp-light-lime"></i><span class="ml-4 text-mp-navy">Matching Sponsor</span>
            </div>
            <span class="text-xl">The Mary Parrish Center is grateful to <b>{{ $CatalogItem->sponsor->name }}</b> for being a Matching Sponsor.</span>
            @if( $CatalogItem->sponsor->matchProgress() == 0 )
            <div class="mt-6 text-mp-blue-green text-center">Be the first to get this matched gift!</div>
            
            @elseif ( $CatalogItem->sponsor->matchProgress() < 100 )
            <div class="justify-self-end w-full py-4">
                <div class="mb-2 text-sm text-center">Match Progress - {{ number_format( $CatalogItem->sponsor->matchProgress(), 0) }}%</div>
                
                <div class="overflow-hidden h-4 mb-4 text-xs flex rounded-full bg-gray-200">
                     <div style="width:{{ $CatalogItem->sponsor->matchProgress() }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-mp-blue-green"></div>
                </div>
            </div>    
            @else 
                <div class="mt-6 text-mp-blue-green text-center">This gift has been matched 100%!</div>
            @endif
           
        </div>
    </div>
</div>
@endif
 <!-- 
** other gifts in this category
-->
<div class="mx-auto px-8 lg:px-0 max-w-4xl">
    <div class="mt-10 mb-4 text-3xl text-center font-display leading-tight">Other gifts in this category</div>
    <div class="grid gap-10 lg:grid-cols-3">
        @foreach( App\Models\Item::where('category_id', '=', $CatalogItem->category_id )->get() as $CategoryItem )
        @if( $CategoryItem->id != $CatalogItem->id )
        <div>
            <a href="/catalog/item/{{ $CategoryItem->id }}`"><img class="w-full bg-yellow-300 object-cover" src="{{ Storage::url( $CategoryItem->img ) }}"></a>
            <p class="mt-2 text-2xl leading-tight">{{ $CategoryItem->name }}</p>
        </div>
        @endif
        @endforeach
        <div class="-mt-4 text-center lg:col-span-3 mb-6">
            <a href="/catalog" class="text-xl text-mp-blue-green ">View Entire Giving Catalog</a>
        </div>
    </div>
</div>
