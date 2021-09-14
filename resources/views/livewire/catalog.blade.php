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
@if ($counter == 1)
<div class="bg-mp-blue-green">
    <div class="max-w-5xl mx-auto py-16 space-y-4">
        <div class="text-center text-white text-mp-blue text-3xl font-display">Make a General Donation</div>
        <p class="text-center text-xl text-white">The Mary Parrish Center is accepting general donations to Housing Hope 2021 if you would prefer that option.</p>
        <div class="text-center">
            <a href="https://maryparrish.kindful.com/" target="_blank"><button class="px-4 py-3 hover:bg-white bg-mp-light-lime text-mp-navy rounded-full mx-auto">Visit our Donation Page</a>
        </div>
    </div>
</div>
@endif
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
<div class="bg-mp-navy">
    <div class="max-w-5xl mx-auto py-12 space-y-4 px-6 md:px-0">
        <div class="text-center uppercase text-white">Major Gift</div>
        <div class="-mt-6 text-3xl font-display text-white text-center">Furnish a Newly Renovated Apartment at The Mary Parrish Center</div>
        <div class="text-5xl font-display text-white text-mp-light-lime text-center">$7,500</div>
        <p class="text-center text-white pb-6 text-xl">The Mary Parrish Center is renovating and updating half of our apartments. Of course, we believe new digs deserve new furniture. The special gift includes naming rights for one of the renovated apartments. If you are interested, please email Mary Katherine Rand at marykatherine@maryparrish.org.</p>
        <div class="mt-10 aspect-w-16 aspect-h-9">
            <img src="{{ Storage::url('photos/website/mpc_apartment.jpg') }}" alt="">
        </div>
    </div>
</div>
</div>

