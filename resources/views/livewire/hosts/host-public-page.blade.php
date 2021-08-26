<div>
    <div class="my-12 text-3xl text-center">
        {{ $user->name }}
    </div>
    <div class="max-w-4xl">
        <div class="my-6">
            <div class="text-center uppercase">
                Amount Raised
            </div>
            <div class="text-3xl font-bold text-center">
                ${{ App\Models\Gift::where('user_id', '=', $user->id )->sum('gift_total') }}
            </div>
        </div>
        <div class="text-center">
            <button href="{{ route('catalog') }}" class="px-4 py-3 text-2xl text-white bg-green-500">Shop the Giving Catalog</button>
        </div>

    </div>
</div>
