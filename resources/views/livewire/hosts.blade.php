<div>
    @foreach( $hosts as $host )
    <h2 class="text-3xl">{{ $host->name }}</h2>
    <div class="my-4">
        
        {{ $host->items->sum('pivot.item_quantity') }}
        
    </div>
    @endforeach
</div>
