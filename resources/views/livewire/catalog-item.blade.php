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
<div class="py-6 mb-6 text-center font-display bg-mp-light-lime text-mp-navy">Housing Hope is preview only until Sept. 13, 2021. Thank you for supporting The Mary Parrish Center.</div>
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
                    @if( $CatalogItem->sponsor )
                    <div class="text-sm text-gray-500"><i class="fa fa-trophy"></i> Your gift will be matched by {{ $CatalogItem->sponsor->name }}</div>
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
                    data-item-description="High-quality replica of The Starry Night by the Dutch post-impressionist painter Vincent van Gogh."
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
                    @if( $CatalogItem->sponsor )
                        <li>Double your gift with match</li>
                    @endif  
                        <li>Gift is 100% tax-deductible</li>
                </ul>
            </div>
        </div>
    </div>
</div>    
