<div class="container mx-auto">
    <div class="mb-4 text-4xl text-center">Housing Hope 2021 Hosts</div>
    <div class="mb-8 text-4xl text-center">Total for all Hosts – ${{ App\Models\Gift::with('items')->sum('gift_total') }}</div>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
         @foreach( $hosts as $host )
        <div class="p-6 bg-gray-100 rounded-md shadow-lg">
            <h2 class="mb-6 text-3xl text-center">{{ $host->name }}</h2>
            <h3 class="mb-4 text-2xl font-bold text-center">${{ $host->totalDonationAmount()->sales }}</h3>
            @php
                $hostId = App\Models\Host::where('name', '=', $host->name)->first()->id 
            @endphp
            <h3 class="mb-4 text-xl text-center">{{ App\Models\Gift::where('host_id', '=', $hostId )->count() }} Gifts</h3>
            <h3 class="mb-4 text-xl text-center">{{ $host->items->sum('pivot.item_quantity') }} Items</h3>
        </div> <!-- end card  -->
        @endforeach
    </div> <!-- end grid  -->
    
</div>
