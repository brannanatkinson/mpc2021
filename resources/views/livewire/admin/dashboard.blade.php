<div>
    @can('admin')
        <x-slot name="title">
            Dashboard
        </x-slot>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Housing Hope 2022 Dashboard') }}
            </h2>
        </x-slot>
        <div class="mb-4 text-center">Manage <a href="{{ route('admin.hosts') }}">Hosts</a> | <a href="{{ route('admin.categories') }}">Categories</a> | <a href="{{ route('admin.items') }}">Items</a> | <a href="{{ route('admin.sponsors') }}">Sponsors</a></div>
        <div class="mb-4 text-center"><a href="{{ route('catalog') }}">Go to Catalog</a></div>
        <div class="max-w-5xl mx-auto">
            <div class="grid grid-cols-3 gap-8 mb-10">
                <div class="p-8 text-center bg-gray-200 rounded-md flex flex-col justify-center items-center">
                    <div class="mb-6 uppercase">
                        Total Dollars Raised
                    </div>
                    <div class="mb-8 text-4xl font-bold">
                        ${{ App\Models\Gift::all()->sum('gift_total') }}
                    </div>
                 </div>
                 <div class="p-8 text-center bg-gray-200 rounded-md flex flex-col justify-center items-center">
                    <div class="mb-6 uppercase">
                        Total Gifts
                    </div>
                    <div class="mb-8 text-4xl font-bold">
                        {{ App\Models\Gift::all()->count() }}
                    </div>
                 </div>
                <div class="p-8 text-center bg-gray-200 rounded-md flex flex-col justify-center items-center">
                    <div class="mb-6 uppercase">
                        Total Number of Donors
                    </div>
                    <div class="mb-8 text-4xl font-bold">
                        {{ App\Models\Donor::all()->count() }}
                    </div>
                 </div>
            </div>
        </div>
        <div class="mt-8 max-w-5xl mx-auto">
            <div class="my-3 text-3xl font-bold">
                2022 Host Summary
            </div>
            <div class="grid grid-cols-3 gap-8 mb-10">
                <div class="p-8 text-center bg-gray-200 rounded-md flex flex-col justify-center items-center">
                    <div class="mb-6 uppercase">
                        Total Raised by Hosts
                    </div>
                    <div class="mb-8 text-4xl font-bold">
                        ${{ App\Models\Gift::where('user_id','!=', null)->sum('gift_total') }}
                    </div>
                 </div>
                 <div class="p-8 text-center bg-gray-200 rounded-md flex flex-col justify-center items-center">
                    <div class="mb-6 uppercase">
                        Total Gifts by Hosts
                    </div>
                    <div class="mb-8 text-4xl font-bold">
                        {{ App\Models\Gift::where('user_id','!=', null)->count() }}
                    </div>
                 </div>
                <div><!-- blank  --></div>
            </div>
            <div class="mt-8 grid grid-cols-5 gap-4">
                <div class=" col-span-2 font-bold">Host Name</div>
                <div class=" font-bold">Amount Raised</div>
                <div class=" font-bold">Total Gifts</div>
                <div class=" font-bold">Total Items</div>
                @foreach( App\Models\User::permission('edit host')->orderBy('name')->get() as $host )
                <div class=" col-span-2">{{ $host->name }}</div>
                <div class="">${{ App\Models\Gift::where('user_id', '=', $host->id )->sum('gift_total') }}</div>
                <div class="">{{ App\Models\Gift::where('user_id', '=', $host->id )->count() }}</div>
                <div class="">{{ $host->items->sum('pivot.item_quantity') }}</div>
                @endforeach
            </div>
        </div>
        <div class="mt-10 max-w-5xl mx-auto">
            <div class="my-3 text-3xl font-bold">
                2022 Giving Catalog Item Summary
            </div>
            <div class="mb-6 grid grid-cols-4 gap-6">
                @foreach ( App\Models\Item::all() as $item )
                    <div class="bg-white text-center flex flex-col rounded-md overflow-hidden">
                        <div class="mb-6 w-full">
                            <img src="{{ Storage::url( App\Models\Item::find( $item->id )->img ) }}" alt="" class="object-fit">
                        </div>
                        <div class="mb-4 text-3xl">
                            {{ $item->sales()->count() > 0 ? $item->sales()->first()->quantity : 0 }}
                        </div>
                        <div class="mb-8 text-sm">
                            {{ $item->sponsor ? $item->sponsor->name : '' }}<br>
                        </div>
                    </div>
                    
                @endforeach
            </div>
        </div>
        <div class="pb-16 max-w-5xl mx-auto">
            <div class="mt-8 mb-6 text-3xl font-bold">
                2022 Gift Summary
            </div>
            <div class="grid grid-cols-5 gap-4">
                <div class=" col-span-2 font-bold">Donor</div>
                <div class=" font-bold">Amount</div>
                <div class=" font-bold">Credited Host</div>
                <!-- add purchase date  -->
                <div class=""></div>
                @foreach( App\Models\Gift::orderBy('gift_total', 'DESC')->get() as $gift )
                <div class=" col-span-2">{{ $gift->donor->full_name }}</div>
                <div class="">${{ $gift->gift_total }}</div>
                <div class="">
                    @if ( $gift->user_id != null )
                        {{ App\Models\User::where('id' , '=', $gift->user_id )->first()->name }}
                    @endif
                </div>
                <div class=""></div>
                @endforeach
            </div>
        </div>


    @endcan

    

</div>
