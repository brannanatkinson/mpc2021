<div>
    <h1 class="text-4xl">Items</h1>
    @foreach ( $items as $item )
        <h2 class="text-3xl">{{ $item->name }}</h2>
        {{ $item->sales() }}
    @endforeach
</div>
