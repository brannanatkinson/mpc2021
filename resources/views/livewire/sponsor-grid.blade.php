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
        <div class="grid grid-cols-2">
            <div>  
                <div class="mb-4 text-center">Giving Catalog Sponsor</div>
                <div>
                    @php 
                        $sponsor = App\Models\Sponsor::where('category', '=', 'catalog')->first()
                    @endphp
                    <a href="#">
                        <img src="{{ Storage::url( $sponsor->img ) }}" alt="">
                    </a>
                </div>
            </div>
            <div>
                <div>
                    <div class="mb-4 text-center">Giving Wall Sponsor</div>
                </div>
                <div>
                    @php 
                        $sponsor = App\Models\Sponsor::where('category', '=', 'wall')->first()
                    @endphp
                    <a href="#">
                        <img src="{{ Storage::url( $sponsor->img ) }}" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="mb-4 text-center">Champions of Hope</div>
        <div class="grid grid-cols-2">
            @foreach ( App\Models\Sponsor::where('category', '=', 'champion')->orderBy('name')->get() as $sponsor)
            <div>  
                <a href="#">
                    <img src="{{ Storage::url( $sponsor->img ) }}" alt="">
                </a>
            </div>
            @endforeach
        </div>
        <div class="mb-4 text-center">Promoters of Hope</div>
        <div class="grid grid-cols-3">
            @foreach ( App\Models\Sponsor::where('category', '=', 'promoter')->orderBy('name')->get() as $sponsor)
            <div>  
                <a href="#">
                    <img src="{{ Storage::url( $sponsor->img ) }}" alt="">
                </a>
            </div>
            @endforeach
        </div>
    </div>

</div>
