<div class="container">
    <div wire:click="showNewItemForm" class="inline-flex px-4 py-3 bg-green-800 text-white">Add new item</div>
    @if ( $updateMode == true )
    @include('livewire.admin.items.new-item')
    @else
    <div>Hide the form</div>
    @endif
</div>
