<div>
    @can('admin')
       <div class="my-6 text-3xl text-center">Housing Hope 2021 Dashboard</div>
       <div class="max-w-5x mx-auto">
           <div class="grid grid-cols-3 gap-8">
               <div class="p-8 text-center">${{ App\Models\Gift::all()->sum('gift_total') }}</div>
               <div class="p-8 text-center">{{ App\Models\Gift::all()->count() }} gifts</div>
               <div class="p-8 text-center">{{ App\Models\Donor::all()->count() }} donors</div>
           </div>
       </div>


    @elsecan('edit host')
        You're a host --  you're userId is {{ auth()->user()->id }}
    @endcan

    

</div>
