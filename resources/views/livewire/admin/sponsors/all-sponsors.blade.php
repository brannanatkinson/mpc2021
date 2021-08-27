<div>
    <div class="my-12 max-w-5xl mx-auto">
        <div class="text-3xl">
            Housing Hope Sponsors
        </div>
        <div class="grid grid-cols-6 gap-8">
                <div class="font-bold"></div>
                <div class="font-bold">Sponsor</div>
                <div class="font-bold">Category</div>
                <div class="font-bold">Item matched</div>
            @foreach ( $sponsors as $sponsor )
                <div><img src="{{ Storage::url( $item->img ) }}" alt="" class="h-24 object-fit"></div>
                <div class=""><a wire:click.prevent="edit({{ $sponsor->id }})"><span clsss="text-2xl">{{ $sponsor->name }}</span></a></div>
                <div class="">{{ $sponsor->category }}</div>
                <div>{{ App\Models\Item::where('sponsor_id', '=', $sponsor-id)->first()->name</div>
            @endforeach
        </div>
    </div>
    <div wire:click="showNewItemForm" class="inline-flex px-4 py-3 bg-green-800 text-white">Add new sponsor</div>
    @if ( $createMode == true )
    @include('livewire.admin.sponsors.new-sponsor')
    @endif
    <!-- @if ( $updateMode == true )
    @include('livewire.admin.sponsors.update-sponsor')
    @endif -->
</div>
