<div>
    <div class="mb-6">
        {{ $gift->donor->full_name }} just made a ${{ $gift->gift_total }} gift to The Mary Parrish Center and credited you as the host.
    </div>
    <div class="mb-6 text-3xl">
        Donation Summary
    </div>
    @foreach( $gift->items as $item )
    <div class="mb-4 text-2xl">
        {{ $item->name }} - {{ $item->pivot->item_quantity }}
    </div>
    @endforeach
    <div>
        With this order, you have helped raise {{ $gift->user->totalDonationAmount()->sales }} for The Mary Parrish Center.
    </div>
    @if ( $gift->user->UserMeta->goal != null ))
    @php $hostGoalProgress = ( App\Models\Gift::where('user_id', '=', $gift->user->id )->sum('gift_total') / $gift->user->UserMeta->goal ) * 100; @endphp
        <div>You are now {{ number_format( $hostGoalProgress, 0 ) }}% toward your goal of <span class="text-green-700 font-bold">${{ $gift->user->UserMeta->goal }}</span> for The Mary Parrish Center</div>
    @endif 
</div>