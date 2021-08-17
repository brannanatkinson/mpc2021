<div>
    @foreach( $hosts as $host )
    <h2 class="text-3xl">{{ $host->name }}</h2>
    <div class="my-4">
        
        {{ $host->items->groupBy()->pivot->sum('item_quantity') }}
        
    </div>
    @endforeach
</div>
