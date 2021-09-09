<x-public-navigation/>
<div class="container mx-auto">
    <x-slot name="title">
            Giving Catalog
        </x-slot>
    <div class="mb-12">
        <img src="{{ Storage::url('/logos/giving_catalog_banner.jpg') }}" class="w-full md:w-1/2 mx-auto" alt="">
    </div>
    @foreach ( App\Models\Category::orderBy('id')->get() as $category )
    <div class="max-w-7xl mx-auto flex flex-col">
        <div class="">
            <div class="text-center">
                <div class="text-sm uppercase">category</div>
                <div class="text-5xl text-mp-blue-green font-display">
                    {{ $category->name }}
                </div>
            </div>
        </div>
        <div class="">
            <div class="container px-4 md:px-0 mt-8 grid grid-col-1 md:grid-cols-4 gap-12 mb-4">
                 @foreach ( $category->items as $item )
                <div class="flex flex-col overflow-hidden rounded-md">
                    <div class="mb-4">
                         <a href="/catalog/item/{{ $item->id}}">
                            <img src="{{ Storage::url( $item->img ) }}" alt="">
                        </a>
                    </div>
                    <div class="h-6 text-center text-sm">
                        @if ( $item->sponsor_id )
                            <i class="fa fa-trophy pr-4"></i>Sponsor Match Doubles Your Gift
                        @endif 
                    </div>
                    <div class="mb-2 h-16 text-2xl ">
                        {{ $item->name }}
                    </div>
                    <div class="mb-4 md:flex-grow">
                        {{ $item->excerpt }}
                    </div>
                    <div class="mb-4 text-3xl">${{ $item->cost }}</div>
                    
                    <div class="justify-self-end mb-8">
                        <a href="/catalog/item/{{ $item->id }}"><button class="px-4 py-4 text-white bg-mp-blue-green">Details</button></a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        <!-- <div>{{ $category->description }}</div> -->
    </div>
    <div class="mb-12"><img src="{{ Storage::url('/graphics/flourish.png') }}" class="w-64 mx-auto" alt=""></div>
    @endforeach

</div>
