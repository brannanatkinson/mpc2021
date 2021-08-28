<div>
    <div class="my-12 text-3xl text-center">
        {{ $user->name }}
    </div>
    <div class="max-w-4xl mx-auto">
        <div class="mt-6 mb-12">
            <div class="mb-6 text-center uppercase">
                Amount Raised
            </div>
            <div class="mb-12 text-6xl text-center font-display">
                ${{ App\Models\Gift::where('user_id', '=', $user->id )->sum('gift_total') }}
                @php
                    if ( $user->UserMeta->goal  ){
                        $hostGoalProgress = ( App\Models\Gift::where('user_id', '=', $user->id )->sum('gift_total') / $user->UserMeta->goal ) * 100;
                    }
                @endphp 
            </div>
            <div class="mb-12">
                <div class="text-center">
                    <a href="{{ route('catalog') }}" class="inline-block px-4 py-3 text-2xl text-white bg-mp-blue-green">Shop the Giving Catalog</a>
                </div>  
            </div>
            @if ( $user->UserMeta->show_goal == true )
            <div class="mb-8">
                <div class="relative pt-1">
                    <div class="mt-6 mb-4 text-xl text-center">
                        Please help me reach my goal of raising <span class="text-green-700 font-bold">${{ $user->UserMeta->goal }}</span> for The Mary Parrish Center
                    </div>
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                        <div style="width:@php echo $hostGoalProgress @endphp%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                    </div>
                    <div class="flex items-center justify-between">
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
        <div class="mb-12">
            <div class="mb-4 text-xl text-center uppercase">Thanks to my family and friends for giving these gifts</div>
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
        <div class="mb-8 bg-white rounded-md">
            <div class="mb-8 text-3xl text-center">Why I'm supporting Housing Hope</div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed convallis tristique sem.  Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi lacinia molestie dui. 
            </p>
        </div>
    </div>
    <div id="mpc" class="bg-mp-coral py-16">
        <div class="container mx-auto px-4 lg:px-0">
            <img src="/storage/logos/mp_green_logo.png" class="mx-auto w-64 mb-8" alt="">
            <div class="mb-4 text-3xl lg:text-4xl text-center text-navy font-display italic leading-tight">About The Mary Parrish Center</div>
            <p class="mb-12 max-w-4xl mx-auto text-xl lg:text-2xl text-white text-center leading-tight">The Mary Parrish Center provides vital services that help survivors through <b>the stages of
                        rebuilding</b> their lives following interpersonal violence.</p>
            <div class="mx-auto p-6 grid gap-6 lg:gap-12 max-w-4xl lg:p-0 lg:grid-cols-3">
                <div class="px-3 py-4 bg-mp-navy rounded shadow-lg">
                    <div class="my-6 text-center text-2xl text-mp-coral font-display italic">Gain independence from abusers</div>
                    <p class="mb-4 text-white text-center">We provide transitional housing for survivors 
                    domestic violence, dating violence, sexual assault, stalking, and/or human trafficking.</p>
                </div>
                <div class="px-3 py-4 bg-white rounded shadow-lg">
                    <div class="my-6 text-center text-2xl text-mp-coral font-display italic">Become self-sufficient</div>
                    <p class="mb-4 text-mp-navy text-center">We help survivors rebuild their lives through a wide range of flexible and optional 
                    support services including clinical therapy, emergency financial assistance, housing advocacy, enrichment activities and case management.</p>
                </div>
                <div class="px-3 py-4 bg-mp-navy rounded shadow-lg">
                    <div class="my-6 text-center text-2xl text-mp-coral font-display italic">Secure permanent housing</div>
                    <p class="mb-4 text-white text-center">We assist survivors in finding permanent housing for themselves and their families.</p>
                </div>
            </div>
            <div class="text-center">
                <a href="https://www.maryparrish.org" target="_blank"><button class="mt-12 px-4 py-4 border-2 border-solid hover:border-white hover:bg-white border-mp-navy text-xl text-mp-navy hover:text-mp-coral rounded">Visit our website for more information</button></a>
            </div>
        </div>
    </div>
</div>
