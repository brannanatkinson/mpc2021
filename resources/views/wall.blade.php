<x-public-layout>
	<div class="mb-12">
		<img src="{{ Storage::url('/logos/giving_wall_banner.jpg') }}" class="w-full md:w-1/2 mx-auto" alt="">
	</div>
	@livewire('results')
	<div class="mt-12 py-10 bg-mp-light-lime">
		<div class="mb-16 max-w-6xl mx-auto mt-12">
			<div class="mb-3 text-4xl text-center text-mp-navy font-display">
				2021 Housing Hope Donor Roll
			</div>
			<p class="text-mp-blue-green text-center text-xl">Thanks to these Housing Hope donors who have chosen to be featured on the Donor Wall.</p>

			<div class="mt-9 grid grid-cols-5">
				@foreach( App\Models\Donor::where('showNameOnWall', '=', 1)->orderBy('full_name')->get() as $donor )
				<div class="py-2">
					<spon class="text-xl">{{ $donor->full_name }}</spon>
				</div>
				@endforeach
			</div>
			
		</div>
	</div>
	<div class="py-10 bg-mp-navy">
		<div class="mb-16 max-w-6xl mx-auto mt-12">
			<div class="mb-3 text-4xl text-center text-mp-coral font-display">
				2021 Housing Donor Notes
			</div>
			<p class="text-mp-light-gray text-center text-xl">The Mary Parrish Center residents and alumni are grateful for your wonderful notes. </p>
			<div class="mt-9 box-border md:masonry before:box-inherit after:box-inherit">
				@foreach( App\Models\Donor::where('note', '!=', null)->get() as $donor )
					@if( $donor->first() )
					    <div class="flex flex-col items-center px-8 py-6 mb-4 bg-gray-200 rounded-lg break-inside">
					    	<div clsss="mb-8 text-center">
					    		<i class="fad fa-envelope-open fa-2x text-mp-coral"></i>
					    	</div>
					    	<div class="mt-3">
					    		<p class="font-display italic leading-loose">{{ $donor->note }}</p>
					    	</div>
					        
					    </div>
					@else
						<div class="px-8 py-6 my-4 bg-gray-200 rounded-lg break-inside">
						  <p>{{ $donor->note }}</p>
						</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
	
</x-public-layout>