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
            <div class="grid grid-cols-5 gap 8">
                @foreach( App\Models\User::permission('edit host')->orderBy('name')->get() as $host )
                <div class="p-4 cols-span-2">{{ $host->name }}</div>
                <div class="p-4">${{ $host->totalDonationAmount() }} Raised</div>
                <div class="p-4">{{ $host->id }}</div>
                @endforeach
            </div>
        </div>


    @elsecan('edit host')
        You're a host --  you're userId is {{ auth()->user()->id }}
    @endcan

    

</div>
