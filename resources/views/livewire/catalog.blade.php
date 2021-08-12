<div class="container mx-auto">
    <h1>2021 Catalog</h1>
    <div class="mt-8 grid grid-cols-3 gap-8 mb-4">
        @foreach ($items as $item)
            <div class="p-8 bg-white rounded-md">
            <a href="/catalog/item/{{ $item->id}}" class="">
                {{ $item->name }}
            </a>
            </div>
        @endforeach
    </div>
</div>
