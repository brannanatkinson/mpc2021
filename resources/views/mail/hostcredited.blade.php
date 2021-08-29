<div>
    <div class="mb-6">
        {{ $gift->donor->full_name }} just made a ${{ $gift->gift_total }} gift to The Mary Parrish Center and credited you as the host.
    </div>
    <div class="mb-6 text-3xl">
        Donation Summary
    </div>
    @foreach( $gift->items as $item )
    <div class="mb-4 text-2xl">
        {{ $item->name }} - {{ $item->pivot->item_quantity }}
    </div>
    @endforeach
</div>