<div>
    @foreach( $hosts as $host )
    <h2 class="text-3xl">{{ $host->name }}</h2>
    <div class="my-4">
        @foreach ( $host->sales() as $sale )
            {{ $sales->items.name }}
        @endforeach
    </div>
    @endforeach
</div>
