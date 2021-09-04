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
            <div class="mt-8 grid grid-cols-2 gap-12 mb-4">
                 @foreach ( $category->items as $item )
                <div class="flex flex-col overflow-hidden rounded-md">
                    <div class="mb-4">
                         <a href="/catalog/item/{{ $item->id}}">
                            <img src="{{ Storage::url( $item->img ) }}" alt="">
                        </a>
                    </div>
                    <div class="h-8 text-center">
                        @if ( $item->sponsor_id )
                            <i class="fa fa-trophy pr-4"></i>Sponsor Match Doubles Your Gift
                        @endif 
                    </div>
                    <div class="mb-2 text-2xl">
                        {{ $item->name }}
                    </div>
                    <div class="mb-4 text-xl flex-grow">
                        {{ $item->excerpt }}
                    </div>
                    <div class="mb-4 text-3xl"> {{ $item->cost }}</div>
                    
                    <div class="justify-self-end mb-8">
                        <button class="px-4 py-4 text-white bg-green-800">Save</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>
