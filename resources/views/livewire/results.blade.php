<div>
    <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-3 gap-8">
            <div class="flex flex-col p-8 text-center text-white bg-mp-coral rounded-lg shadow-md">
                <div class="mb-6 font-display"><i class="fa fa-star fa-2x"></i></div>
                <div class="mb-6 text-5xl font-bold">{{ App\Models\Gift::all()->count() }}</div>
                <div class="mb-4 text-xl uppercase">Donors</div>
            </div>
            <div class="flex flex-col p-8 text-center text-white bg-mp-light-lime rounded-lg shadow-md">
                <div class="mb-6 font-display"><i class="fa fa-gift fa-2x"></i></div>
                <div class="mb-6 text-5xl font-bold">{{ DB::table('gift_item')->select(DB::raw('SUM(item_quantity) as quantity'))->first()->quantity }}</div>
                <div class="mb-4 text-xl uppercase">Items Given</div>
            </div>
            <div class="flex flex-col p-8 text-center text-white bg-mp-blue-green rounded-lg shadow-md">
                <div class="mb-6 font-display"><i class="fa fa-heart fa-2x"></i></div>
                <div class="mb-6 text-5xl font-bold">${{ number_format( App\Models\Gift::all()->sum('gift_total') + App\Models\Sponsor::all()->sum('amount'), 0, ',' ) }}</div>
                <div class="mb-4 text-xl uppercase">
                    Total Raised
                </div>
            </div>
        </div>
    </div>
</div>
