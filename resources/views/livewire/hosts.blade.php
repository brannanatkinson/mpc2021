<div>
    @foreach( $hosts as $host )
    <h2 class="text-3xl">{{ $host->name }}</h2>
    <div class="my-4">
        Total items sold - {{ $host->items->sum('pivot.item_quantity') }}<br>
        @foreach ( $host->sales() as $sale )
            {{ $sale->name }} - {{ $sale->quantity }}
        @endforeach
    </div>
    @endforeach
</div>
