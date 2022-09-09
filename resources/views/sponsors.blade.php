<x-public-layout>
	<x-slot name="title">
        Housing Hope Sponsors
    </x-slot>
	<div class="mb-6 text-center text-4xl font-display">Housing Hope Sponsors</div>
	<div class="max-w-4xl mx-auto mb-12 px-6 md:px-0 text-xl">
		The Mary Parrish Center is greatful to all our 2021 Housing Hope Sponsors! Combined they have contributed a total of <span class="text-mp-blue-green">${{ number_format(App\Models\Sponsor::all()->sum('amount'), 0, ',') }}</span> toward our work assisting survivors of interpersonal violence and helped make Housing Hope such a succesful event.
	</div>
	@livewire('sponsor-grid')
	@livewire('matching-sponsor-grid')
</x-public-layout>