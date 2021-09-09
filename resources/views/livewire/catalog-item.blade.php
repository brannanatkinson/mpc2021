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
@if ( $showOnPage == 0)
<div class="py-6 mb-6 text-center font-display bg-mp-light-lime text-mp-navy">Housing Hope is preview only until Sept. 13, 2021. Thank you for supporting The Mary Parrish Center.</div>
@endif
<div class="container mx-auto">
    
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-row">
            <div class="w-3/5">
                <img src="{{ Storage::url( $CatalogItem->img ) }}" alt="">
            </div>
            <div class="w-2/5 p-12">
                <div class="text-3xl">
                    {{ $CatalogItem->name }}
                </div>
                <div class="mt-4">
                    ${{ $CatalogItem->cost }}
                </div>
                <div class="mt-8">
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

                    @if( $showOnPage == 1 )
                    <button class="snipcart-add-item px-4 py-3 bg-indigo-700 text-white"
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
                </div>
            </div>
        </div>
    </div>
    

</div>
