<div>
    <div class="my-12 text-3xl text-center">
        {{ $user->name }}
    </div>
    <div class="max-w-4xl mx-auto">
        <div class="mt-6 mb-12">
            <div class="mb-6 text-center uppercase">
                Amount Raised
            </div>
            <div class="text-6xl font-bold text-center">
                ${{ App\Models\Gift::where('user_id', '=', $user->id )->sum('gift_total') }}
                @php
                    if ( $user->UserMeta->goal  ){
                        $hostGoalProgress = ( App\Models\Gift::where('user_id', '=', $user->id )->sum('gift_total') / $user->UserMeta->goal ) * 100;
                    }
                @endphp 
            </div>
            @if ( $user->UserMeta->show_goal == true )
            <div class="my-8">
                <div class="relative pt-1">
                    <div class="mt-6 mb-4 text-xl text-center">
                        Please help me reach my goal of raising <span class="text-green-700 font-bold">${{ $user->UserMeta->goal }}</span> for The Mary Parrish Center
                    </div>
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                        <div style="width:@php echo $hostGoalProgress @endphp%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                    </div>
                    <div class="flex mb-2 items-center justify-between">
                        <div>
                          <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                            Progress Toward My Goal
                          </span>
                        </div>
                        <div class="text-right">
                          <span class="text-xs font-semibold inline-block text-green-600">
                            @php echo $hostGoalProgress @endphp%
                          </span>
                        </div>
                  </div>
                </div>
            </div>
            @endif
        </div>
        <div class="my-6">
            <div class="text-center">
                <a href="{{ route('catalog') }}" class="inline-block px-4 py-3 text-2xl text-white bg-green-500">Shop the Giving Catalog</a>
            </div>  
        </div>
        <div class="mt-6">
            <div class="mb-4 text-3xl">Thanks to my family and friends for giving these gifts</div>
            @if( $user->donatedItems()->count() > 0 )
            <div class="mb-6 grid grid-cols-3 gap-6">
                @foreach ( $user->donatedItems() as $item )
                <div class="bg-gray-100 text-center flex flex-col rounded-md overflow-hidden">
                    <div class="mb-6 w-full">
                        <img src="{{ Storage::url( App\Models\Item::find( $item->id )->img ) }}" alt="" class="object-fit">
                    </div>
                    <div class="mb-8 text-3xl">{{ $item->quantity }}</div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="my-6 bg-white rounded-md">
            <div class="mb-8 text-3xl text-center">Why I'm supporting Housing Hope</div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed convallis tristique sem.  Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi lacinia molestie dui. 
            </p>
        </div>
        

    </div>
</div>
