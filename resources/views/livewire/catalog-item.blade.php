@guest
<div class="container mx-auto">
    <div class="text-3xl">
        {{ $CatalogItem->name }}
    </div>
    <div class="mt-4">
        {{ $CatalogItem->cost}}
    </div>
    <div>
        <img src="{{ Storage::url( $CatalogItem->img ) }}" alt="">
    </div>
    <div class="mt-8">
        @php 
            $hosts = App\Models\User::permission('edit host')->get()
            $hostNames = "--|"
            @foreach ( $hosts as $host )
                $hostNames += $host->name . '|'
            @endforeach
            dd( $hostNames )
        @endphp

        <button class="snipcart-add-item px-4 py-3 bg-indigo-700 text-white"
            data-item-id="{{ $CatalogItem->name}}"
            data-item-price="{{ $CatalogItem->cost }}"
            data-item-url="/catalog/item/{{ $CatalogItem->id }}"
            data-item-description="High-quality replica of The Starry Night by the Dutch post-impressionist painter Vincent van Gogh."
            data-item-name="{{ $CatalogItem->name }}"
            data-item-custom1-name="Credit your virtual host"
            data-item-custom1-options="--|Rinkle|Ralphie"
            data-item-custom1-value="Rinkle Atkinson">

            Add to cart
        </button>
    </div>
</div>
@endguest
