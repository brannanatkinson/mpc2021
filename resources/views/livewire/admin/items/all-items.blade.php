<div>
    <div wire:click="showNewItemForm" class="px-4 py-3 bg-green text-white">Add new item</div>
    @if ( $updateMode == true )
    <div>Form will go here</div>
    @else
    <div>Hide the form</div>
    @endif
</div>
