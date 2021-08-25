<div>
    @can('admin')
        <div class="my-6 text-3xl text-center">Housing Hope 2021 Dashboard</div>
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
                2021 Host Summary
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
            
            <div class="mt-8 grid grid-cols-5 gap-8">
                <div class="px-4 col-span-2 font-bold">Host Name</div>
                <div class="px-4 font-bold">Amount Raised</div>
                <div class="px-4 font-bold">Total Gifts</div>
                <div class="px-4 font-bold">Total Items</div>
                @foreach( App\Models\User::permission('edit host')->orderBy('name')->get() as $host )
                <div class="px-4 col-span-2">{{ $host->name }}</div>
                <div class="px-4">${{ App\Models\Gift::where('user_id', '=', $host->id )->sum('gift_total') }}</div>
                <div class="px-4">{{ App\Models\Gift::where('user_id', '=', $host->id )->count() }}</div>
                <div class="px-4">{{ $host->items->sum('pivot.item_quantity') }}</div>
                @endforeach
            </div>
        </div>
        <div class="mb-16 max-w-5xl mx-auto">
            <div class="mt-8 mb-6 text-3xl font-bold">
                2021 Gift Summary
            </div>
            <div class="grid grid-cols-5 gap-8">
                <div class="px-4 col-span-2 font-bold">Donor</div>
                <div class="px-4 font-bold">Amount</div>
                <div class="px-4"></div>
                @foreach( App\Models\Gift::orderBy('gift_total', 'DESC')->get() as $gift )
                <div class="px-4 col-span-2">{{ $gift->donor->full_name }}</div>
                <div class="px-4">${{ $gift->gift_total }}</div>
                <div class="px-4"></div>
                @endforeach
            </div>
        </div>


    @elsecan('edit host')
        <div class="my-6 text-3xl text-center">Housing Hope 2021 Dashboard for {{ auth()->user()->name }}</div>
        <div class="max-w-5xl mx-auto">
            <div class="grid grid-cols-3 gap-8">
                <div class="p-8 text-center bg-gray-200 rounded-md flex flex-col justify-center items-center">
                    <div class="mb-6 uppercase">
                        Total Raised
                    </div>
                    <div class="mb-8 text-4xl font-bold">
                        ${{ App\Models\Gift::where('user_id', '=', auth()->user()->id )->sum('gift_total') }}
                    </div>
                 </div>
                <div class="p-8 text-center bg-gray-200 rounded-md flex flex-col justify-center items-center">
                    <div class="mb-6 uppercase">
                        Total Gifts
                    </div>
                    <div class="mb-8 text-4xl font-bold">
                        {{ App\Models\Gift::where('user_id', '=', auth()->user()->id )->count() }} Gifts
                    </div>
                </div>
                <div class="p-8 text-center bg-gray-200 rounded-md flex flex-col justify-center items-center">
                    <div class="mb-6 uppercase">
                        Total Donors
                    </div>
                    <div class="mb-8 text-4xl font-bold">
                        {{ App\Models\Gift::where('user_id', '=', auth()->user()->id )->count('donor_id') }}
                    </div>
                 </div>
            </div>
        </div>
        <div class="mt-10 max-w-5xl mx-auto">
            <div class="my-3 text-3xl">Items Donated</div>
            <div class="grid grid-cols-4 gap-8">
                @foreach ( App\Models\User::find( auth()->user()->id )->donatedItems() as $item)
                <div class="p-8 text-center bg-gray-200 rounded-md flex flex-col justify-center items-center">
                    <div class="mb-6 uppercase">
                        {{ $item->item_name }}
                    </div>
                    <div class="mb-8 text-4xl font-bold">
                        {{ $item->quantity }}
                    </div>
                 </div>
                @endforeach
            </div>
        </div>
        <div class="mt-10 max-w-5xl mx-auto">
            <div class="my-3 text-3xl font-bold">
                2021 Donor Summary
            </div>
            <div class="grid grid-cols-3 gap-8">
                <div class="px-4 font-bold">Donor Name</div>
                <div class="px-4 font-bold">Amount </div>
                 <div class="px-4 font-bold">Items </div>
                @foreach( App\Models\Gift::where('user_id', '=', auth()->user()->id )->get() as $gift )
                <div class="px-4">{{ $gift->donor->full_name }}</div>
                <div class="px-4">${{ $gift->gift_total }} </div>
                <div class="px-4">{{ $gift->items->sum('pivot.item_quantity') }}</div>
                @endforeach
            </div>
        </div>
    @endcan

    

</div>
