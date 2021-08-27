<div>
    <div class="my-12 max-w-5xl mx-auto">
        <div class="text-3xl">
            Housing Hope Sponsors
        </div>
        <div class="grid grid-cols-6 gap-8">
            @foreach ( $sponsors as $sponsor )
                <div class="col-span-3"><span clsss="text-2xl">{{ $sponsor->name }}</span> </div>
                <div class="col-span-2">{{ $sponsor->category }}</div>
                <div><a wire:click.prevent="edit({{ $sponsor->id }})">Edit</a></div>
            @endforeach
        </div>
    </div>
    <div wire:click="showNewItemForm" class="inline-flex px-4 py-3 bg-green-800 text-white">Add new sponsor</div>
    @if ( $createMode == true )
    @include('livewire.admin.categories.new-sponsor')
    @endif
    <!-- @if ( $updateMode == true )
    @include('livewire.admin.categories.update-sponsor')
    @endif -->
</div>
