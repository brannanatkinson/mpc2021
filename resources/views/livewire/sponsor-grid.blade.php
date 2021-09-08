<div>
    <!-- 
    *  Giving Cataglog / Giving Wall
    * Chamption of Hope
    * Matching
    * Promoter
    * Advocate
    * Bearer
    * Supporter
    -->
    <div class="max-w-6xl mx-auto">
        <div class="container grid grid-cols-1 md:grid-cols-2 mb-8">
            <div>  
                <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">Giving Catalog Sponsor</div>
                <div>
                    @php 
                        $sponsor = App\Models\Sponsor::where('category', '=', 'catalog')->first()
                    @endphp
                    <a href="#">
                        <img src="{{ Storage::url( $sponsor->img ) }}" class="w-1/2 mx-auto" alt="">
                    </a>
                </div>
            </div>
            <div>
                <div>
                    <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">Giving Wall Sponsor</div>
                </div>
                <div>
                    @php 
                        $sponsor = App\Models\Sponsor::where('category', '=', 'wall')->first()
                    @endphp
                    <a href="#">
                        <img src="{{ Storage::url( $sponsor->img ) }}" class="w-1/2 mx-auto" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">Champions of Hope</div>
        <div class="container grid mb-8">
            @foreach ( App\Models\Sponsor::where('category', '=', 'champion')->orderBy('name')->get() as $sponsor)
            <div class="flex justify-center w-1/">  
                <a href="#">
                    <img src="{{ Storage::url( $sponsor->img ) }}" class="w-1/2 mx-auto" alt="">
                </a>
            </div>
            @endforeach
        </div>
        <!-- <div class="mb-4 text-center font-display text-2xl text-mp-coral">Promoters of Hope</div>
        <div class="container grid grid-cols-3 mb-8">
            @foreach ( App\Models\Sponsor::where('category', '=', 'promoter')->orderBy('name')->get() as $sponsor)
            <div>  
                <a href="#">
                    <img src="{{ Storage::url( $sponsor->img ) }}" alt="">
                </a>
            </div>
            @endforeach
        </div> -->
        <div class="mb-4 text-center font-display text-2xl text-mp-coral">Matching Sponsors</div>
        <div class="container grid grid-cols-1 md:grid-cols-3 mb-8">
            @foreach ( App\Models\Sponsor::where('category', '=', 'matching')->orderBy('name')->get() as $sponsor)
            <div class=" h-64 w-full">  
                <div class="flex justify-center h-full items-center mb-4">
                    @if( $sponsor->img != null)
                        <img src="{{ Storage::url( $sponsor->img )}}" class="object-contain h-64 w-64" alt="">
                    @else
                    <a href="#">
                        <span class="text-center text-xl">{{ $sponsor->name }}</span>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="mb-4 text-center font-display text-2xl text-mp-coral">Advocates of Hope</div>
        <div class="container grid grid-cols-1 md:grid-cols-3 mb-8">
            @foreach ( App\Models\Sponsor::where('category', '=', 'advocate')->orderBy('name')->get() as $sponsor)
            <div class="text-center">  
                <a href="#">
                    {{ $sponsor->name }}
                </a>
            </div>
            @endforeach
        </div>
        <div class="mb-4 text-center font-display text-2xl text-mp-coral">Bearers of Hope</div>
        <div class="container grid grid-cols-1 md:grid-cols-3 mb-8">
            @foreach ( App\Models\Sponsor::where('category', '=', 'bearer')->orderBy('name')->get() as $sponsor)
            <div class="text-center">  
                <a href="#">
                    {{ $sponsor->name }}
                </a>
            </div>
            @endforeach
        </div>
        <div class="mb-4 text-center font-display text-2xl text-mp-coral">Supporters of Hope</div>
        <div class="container grid grid-cols-1 md:grid-cols-3 mb-8">
            @foreach ( App\Models\Sponsor::where('category', '=', 'supporter')->orderBy('name')->get() as $sponsor)
            <div class="text-center">  
                <a href="#">
                    {{ $sponsor->name }}
                </a>
            </div>
            @endforeach
        </div>
    </div>

</div>
