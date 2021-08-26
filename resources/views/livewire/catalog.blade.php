<div class="py-12 container mx-auto">
    <h1 class="text-3xl">2021 Catalog</h1>
    <div class="mt-8 grid grid-cols-3 gap-8 mb-4">
         @foreach ($items as $item)
        <div class="overflow-hidden rounded-md">
            <div class="mb-4">
                <img src="{{ Storage::url( $item->img ) }}" alt="">" alt="">
            </div>
            <div class="mb-8 text-2xl">
                {{ $item->name}}
            </div>
            <div class="mb-6">
                <a href="/catalog/item/{{ $item->id}}" class="px-4 py-3 bg-green-500 text-white">
                    Details
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
