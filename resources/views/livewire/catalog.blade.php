<x-public-navigation/>
<div class="container mx-auto">
    <x-slot name="title">
            Giving Catalog - Test
        </x-slot>
    <div class="max-w-4xl mx-auto flex flex-col items-center md:flex-row md:justify-center">
        <img src="{{ Storage::url('/logos/giving_catalog_icon.png')}} " class="h-32 z-20" alt="">
        <img src="{{ Storage::url('/logos/giving_catalog_name.png')}}" class="h-40 md:h-48 md:self-center -mt-12 md:mt-0 " alt="">
        <img src="{{ Storage::url('/logos/giving_catalog_sponsor.png')}}" class="h-24 md:h-24 self-center z-10 -mt-12 md:mt-0 md:self-center" alt="">
    </div>
    
</div>
@php 
    $counter = 0;
@endphp 
@foreach ( App\Models\Category::orderBy('id')->get() as $category )
@php 
        if($counter % 2 != 0){
            $background = 'py-16 bg-mp-light-gray';
        } else {
            $background = 'py-12 bg-white';
        }
    @endphp 

<div class="@php echo $background @endphp">
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
            <div class="container px-4 lg:px-0 mt-8 grid grid-col-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-4">
                @foreach ( $category->items as $item )
                <div class="flex flex-col overflow-hidden rounded-md">
                    <div class="mb-4">
                         <a href="/catalog/item/{{ $item->id}}">
                            <img src="{{ Storage::url( $item->img ) }}" alt="">
                        </a>
                    </div>
                    <div class="h-6 text-center text-sm">

                        @if ( $item->sponsor_id != null AND $item->sponsor->hasAvailableMatch() == true )
                            <i class="fa fa-trophy pr-4 text-mp-light-lime "></i><spon class="text-mp-navy">Sponsor Match Doubles Your Gift</spon>
                        @endif 
                    </div>
                    <div class="mb-2 md:h-16 text-2xl ">
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
        @php
            $counter++
        @endphp 
        
        <!-- <div>{{ $category->description }}</div> -->
    </div>
</div>
    <!-- <div class="mb-12"><img src="{{ Storage::url('/graphics/flourish.png') }}" class="w-64 mx-auto" alt=""></div> -->
@endforeach
</div>
