@guest
<div class="container mx-auto">
    <div class="text-3xl">
        {{ $CatalogItem->name }}
    </div>
    <div class="mt-4">
        {{ $CatalogItem->cost}}
    </div>
    <div class="mt-8">
        <button class="snipcart-add-item px-4 py-3 bg-indigo-700 text-white"
            data-item-id="stock-the-pantry"
            data-item-price="{{ $CatalogItem->cost }}"
            data-item-url="/catalog/item/{{ $CatalogItem->id }}"
            data-item-description="High-quality replica of The Starry Night by the Dutch post-impressionist painter Vincent van Gogh."
            data-item-name="{{ $CatalogItem->name }}">
            Add to cart
        </button>
    </div>
</div>
@endguest
