<div>
    <h1 class="text-4xl">Items</h1>
    @foreach ( $items as $item )
        {{ $item->name }}
    @endforeach
</div>
