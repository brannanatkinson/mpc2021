<div>
    <div class="my-12 max-w-5xl mx-auto">
        <div class="text-3xl">
            Giving Catalog Items
        </div>
        <div class="grid grid-cols-2 gap-6">
            @foreach ( $items as $item )
            <div class="flex flex-row items-center">
                <img src="{{ Storage::url( $item->img ) }}" alt="" class="h-24 object-fit">
                <div><span clsss="pl-8 text-2xl">{{ $item->name }}</span> – <a wire:click.prevent="edit({{ $item->id }})">Edit</a></div>
            </div>  
            @endforeach
        </div>
    </div>
    <div wire:click="showNewItemForm" class="inline-flex px-4 py-3 bg-green-800 text-white">Add new item</div>
    @if ( $createMode == true )
    @include('livewire.admin.items.new-item')
    @endif
    @if ( $updateMode == true )
    @include('livewire.admin.items.update-item')
    @endif
</div>
