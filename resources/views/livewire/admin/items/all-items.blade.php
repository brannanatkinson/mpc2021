<div>
    <div class="my-12 max-w-5xl mx-auto">
        <div class="">
            <div class="mb-4 text-3xl">Giving Catalog Items</div>
            <p class="mb-8">Click an item image to edit</p>
        </div>
        <div class="grid grid-cols-4 gap-2">
            @foreach ( $items as $item )
            <div class="flex flex-row items-center">
                <a wire:click.prevent="edit({{ $item->id }})"><img src="{{ Storage::url( $item->img ) }}" alt="" class="h-24 object-fit"></a>
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
