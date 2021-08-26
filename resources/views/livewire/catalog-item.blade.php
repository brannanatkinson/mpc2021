<div class="container mx-auto">
    <div class="max-w-4xl mx-auto">
        <img src="{{ asset('storage/app/' . $CatalogItem->img ) }}" class="h-full" alt="">
    </div>
    <div class="text-3xl">
        {{ $CatalogItem->name }}
    </div>
    <div class="mt-4">
        {{ $CatalogItem->cost}}
    </div>
    <div>
        <img src="{{ Storage::url( $CatalogItem->img ) }}" alt="">
    </div>
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

    <div class="mt-8">
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
    </div>
</div>
