<div class="container">
    <div class="max-w-5xl">
        <div class="text-3xl">
            Add a New Item
        </div>
        <form wire:submit.prevent="saveNewItem">
            <lable>Item Name</lable>
            <input type="text" class="h-16 bg-green-100 rounded-md" wire:model="newItemName">
            <lable>Item Description</lable>
            @error('newItemName') <span class="error">{{ $message }}</span> @enderror

            <textarea class="h-16 bg-green-100 rounded-md" wire:model="newItemDescription"></textarea>
            @error('newItemDescription') <span class="error">{{ $message }}</span> @enderror

            <button type="submit">Save New Item</button>
        </form>
    </div>
</div>
