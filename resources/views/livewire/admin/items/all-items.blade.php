<div class="container">
    <div class="my-12 max-w-5xl">
        <div class="text-3xl">
            Giving Catalog Items
        </div>
        <div class="grid grid-cols-6 gap-8">
            @foreach ( $items as $item )
                <div>Image</div>
                <div class="col-span-4">{{ $item->name }} </div>
                <div>Edit</div>
            @endforeach
        </div>
    </div>
    <div wire:click="showNewItemForm" class="inline-flex px-4 py-3 bg-green-800 text-white">Add new item</div>
    @if ( $updateMode == true )
    @include('livewire.admin.items.new-item')
    @endif
</div>
