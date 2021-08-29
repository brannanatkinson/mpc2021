<div>
    <div>{{ $gift->donor->full_name }} just made a donation in the amount of {{ $gift->gift_total }} and credited you. </div>
    <div>
        Donation Summary
    </div>
    @foreach( $gift->items() as $item )
    <div>{{ $item->item_name }} - {{ $item->quantity }}</div>
    @endforeach
</div>