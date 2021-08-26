<div>
    <div class="my-12 max-w-5xl mx-auto">
        <div class="text-3xl">
            Giving Catalog Categories
        </div>
        <div class="grid grid-cols-6 gap-8">
            @foreach ( $items as $item )
                <div class="col-span-4"><span clsss="text-2xl">{{ $item->name }}</span> </div>
                <div><a wire:click.prevent="edit({{ $item->id }})">Edit</a></div>
            @endforeach
        </div>
    </div>
    <div wire:click="showNewItemForm" class="inline-flex px-4 py-3 bg-green-800 text-white">Add new category</div>
    @if ( $createMode == true )
    @include('livewire.admin.items.new-item')
    @endif
    @if ( $updateMode == true )
    @include('livewire.admin.items.update-item')
    @endif
</div>