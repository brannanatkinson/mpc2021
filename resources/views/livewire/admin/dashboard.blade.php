<div>
    @can('admin')
        <div class="my-6 text-3xl text-center">Housing Hope 2021 Dashboard</div>
        <div class="max-w-5xl mx-auto">
            <div class="grid grid-cols-3 gap-8">
                <div class="p-8 text-center bg-gray-100 rounded-md">
                     ${{ App\Models\Gift::all()->sum('gift_total') }}
                 </div>
                <div class="p-8 text-center bg-gray-100 rounded-md">
                     {{ App\Models\Gift::all()->count() }} gifts
                 </div>
                <div class="p-8 text-center bg-gray-100 rounded-md">
                     {{ App\Models\Donor::all()->count() }} donors
                 </div>
            </div>
        </div>
        <div class="max-w-6xl mx-auto">
            <div class="my-3 text-3xl font-bold">
                2021 Host Summary
            </div>
            <div class="grid grid-cols-5 gap-8">
                <div class="px-4 col-span-2">Host Name</div>
                <div class="px-4">Amount Raised</div>
                <div class="px-4">Total Gifts</div>
                @foreach( App\Models\User::permission('edit host')->orderBy('name')->get() as $host )
                <div class="px-4 col-span-2">{{ $host->name }}</div>
                <div class="px-4">${{ App\Models\Gift::where('user_id', '=', $host->id )->sum('gift_total') }} Raised</div>
                <div class="px-4">{{ App\Models\Gift::where('user_id', '=', $host->id )->count() }} Gifts</div>
                @endforeach
            </div>
        </div>
        <div class="max-w-6xl mx-auto">
            <div class="my-3 text-3xl font-bold">
                2021 Gift Summary
            </div>
            <div class="grid grid-cols-5 gap-8">
                <div class="px-4 col-span-2">Donor</div>
                <div class="px-4">Amount</div>
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
                <div class="p-8 text-center bg-gray-100 rounded-md">
                     ${{ App\Models\Gift::where('user_id', '=', auth()->user()->id )->sum('gift_total') }} Raised
                 </div>
                <div class="p-8 text-center bg-gray-100 rounded-md">
                     {{ App\Models\Gift::where('user_id', '=', auth()->user()->id )->count() }} Gifts
                 </div>
                <div class="p-8 text-center bg-gray-100 rounded-md">
                    {{ App\Models\Gift::where('user_id', '=', auth()->user()->id )->count('donor_id') }} Donors
                </div>
            </div>
        </div>
        <div class="max-w-4xl mx-auto">
            <div class="my-3 text-3xl font-bold">
                2021 Donor Summary
            </div>
            <div class="grid grid-cols-2 gap-8">
                <div class="px-4">Donor Name</div>
                <div class="px-4">Amount </div>
                @foreach( App\Models\Gift::where('user_id', '=', auth()->user()->id )->get() as $gift )
                <div class="px-4">{{ $gift->donor->full_name }}</div>
                <div class="px-4">${{ $gift->gift_total }} </div>
                @endforeach
            </div>
        </div>
    @endcan

    

</div>
