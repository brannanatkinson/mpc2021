<div>
    @foreach( $hosts as $host )
    <h2 class="text-3xl">{{ $host->name }}</h2>
    <div class="my-4">
        Total items sold - {{ $host->items->sum('pivot.item_quanity') }}<br>
        @foreach ( $host->sales() as $sale )
            {{ $sale->item_name }} - {{ $sale->quantity }}
        @endforeach
    </div>
    @endforeach
</div>
