<div class="py-12 container mx-auto">
    <h1 class="text-3xl">2021 Giving Catalog</h1>
    @foreach ( App\Models\Category::orderBy('id')->get() as $category )
    <div class="max-w-7xl mx-auto flex flex-row">
        <div class="w-1/4 ">
            <div class="h-full pt-16 px-12 flex flex-col">
                <div class="text-3xl">
                    {{ $category->name }}
                </div>
                <div>{{ $category->description }}</div>
            </div>
        </div>
        <div class="w-3/4">
            <div class="mt-8 grid grid-cols-2 gap-8 mb-4">
                 @foreach ( $category->items as $item)
                <div class="overflow-hidden rounded-md">
                    <div class="mb-4">
                         <a href="/catalog/item/{{ $item->id}}">
                            <img src="{{ Storage::url( $item->img ) }}" alt="">
                        </a>
                    </div>
                    <div class="mb-8">
                         <a href="/catalog/item/{{ $item->id}}">
                            <div class="text-2xl">{{ $item->name }}</div>
                        </a>
                        <div class="">${{ $item->cost }}</div>
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
    </div>
    @endforeach
</div>
