<div>
    <!-- 
    * Presenting
    * Giving Cataglog / Giving Wall
    * Chamption of Hope
    * Matching
    * Promoter
    * Advocate
    * Bearer
    * Supporter

    making some comments
    -->
    <div class="max-w-6xl mx-auto">
        <div class="container grid grid-cols-1 md:grid-cols-2 mb-8">
            <div class="col-span-2 mb-16">  
                <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">Presenting Sponsor</div>
                <div>
                    @php 
                        $sponsor = App\Models\Sponsor::where('category', '=', 'presenting')->first()
                    @endphp
                    <a href="http://{{ $sponsor->website }}">
                        <img src="{{ Storage::url( $sponsor->img ) }}" class="w-1/2 mx-auto" alt="">
                    </a>
                </div>
            </div>
            <div>  
                @php 
                    $sponsor = App\Models\Sponsor::where('category', '=', 'catalog')->first()
                @endphp
                @if ( $sponsor )
                <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">Giving Catalog Sponsor</div>
                    <div>
                   
                        <a href="http://{{ $sponsor->website }}">
                            <img src="{{ Storage::url( $sponsor->img ) }}" class="w-3/4 mx-auto" alt="">
                        </a>
                        
                    </div>
                @endif
            </div>
            <div>
                @php 
                    $sponsor = App\Models\Sponsor::where('category', '=', 'wall')->first()
                @endphp
                @if ( $sponsor )
                <div>
                    <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">Giving Wall Sponsor</div>
                </div>
                <div>
                    <a href="http://{{ $sponsor->website }}">
                        <img src="{{ Storage::url( $sponsor->img ) }}" class="w-64 mx-auto" alt="">
                    </a>
                </div>
                @endif
            </div>
        </div>
        @php 
            $sponsor = App\Models\Sponsor::where('category', '=', 'champion')->first()
        @endphp
        @if ( $sponsor )
        <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">Champion of Hope Sponsor</div>
        <div class="container max-w-3xl mx-auto grid mb-8">
            <div class="flex justify-center">  
                <a href="http://{{ $sponsor->website }}">
                    <img src="{{ Storage::url( $sponsor->img ) }}" class="w-2/5 mx-auto" alt="">
                </a>
            </div>
        </div>
        @endif
        <!-- <div class="mb-4 text-center font-display text-2xl text-mp-coral">Promoters of Hope</div>
        <div class="container grid grid-cols-3 mb-8">
            @foreach ( App\Models\Sponsor::where('category', '=', 'promoter')->orderBy('name')->get() as $sponsor)
            <div>  
                <a href="http://{{ $sponsor->website }}">
                    <img src="{{ Storage::url( $sponsor->img ) }}" alt="">
                </a>
            </div>
            @endforeach
        </div> -->
        <div class="mb-4 text-center font-display text-3xl text-mp-blue-green">Matching Sponsors</div>
        <div class="container grid grid-cols-1 md:grid-cols-4 mb-8 gap-8 ">
            @foreach ( App\Models\Sponsor::where('category', '=', 'matching')->orderBy('name')->get() as $sponsor)
            <div class=" h-64 w-full bg-white ">  
                <div class="flex justify-center h-full items-center mb-4">
                    @if( $sponsor->img != null)
                        <img src="{{ Storage::url( $sponsor->img )}}" class="object-contain h-64 w-64" alt="">
                    @else
                    
                        <span class="text-center text-xl">{{ $sponsor->name }}</span>
                    
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="mb-4 text-center font-display text-2xl text-mp-coral">Advocates of Hope</div>
        <div class="container grid grid-cols-1 md:grid-cols-3 mb-8">
            @foreach ( App\Models\Sponsor::where('category', '=', 'advocate')->orderBy('name')->get() as $sponsor)
            <div class="text-center">  
                <a href="http://{{ $sponsor->website }}">
                    {{ $sponsor->name }}
                </a>
            </div>
            @endforeach
        </div>
        <div class="mb-4 text-center font-display text-2xl text-mp-coral">Bearers of Hope</div>
        <div class="container grid grid-cols-1 md:grid-cols-3 mb-8">
            @foreach ( App\Models\Sponsor::where('category', '=', 'bearer')->orderBy('name')->get() as $sponsor)
            <div class="text-center">  
                <a href="http://{{ $sponsor->website }}">
                    {{ $sponsor->name }}
                </a>
            </div>
            @endforeach
        </div>
        <div class="mb-4 text-center font-display text-2xl text-mp-coral">Supporters of Hope</div>
        <div class="container grid grid-cols-1 md:grid-cols-3 mb-8">
            @foreach ( App\Models\Sponsor::where('category', '=', 'supporter')->orderBy('name')->get() as $sponsor)
            <div class="text-center">  
                <a href="http://{{ $sponsor->website }}">
                    {{ $sponsor->name }}
                </a>
            </div>
            @endforeach
        </div>
    </div>

</div>
