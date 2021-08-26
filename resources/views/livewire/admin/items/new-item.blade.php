<div class="container">
    <div class="max-w-5xl">
        <div class="text-3xl">
            Add a New Item
        </div>
        <form wire:submit.prevent="saveNewItem" class="flex flex-col">
            <div>
                <label>Item Name</label>
                <input type="text" class="mb-8 h-16 bg-green-100 rounded-md" wire:model="newItemName">
            </div>
            <div>
                <label>Item Description</label>
                @error('newItemName') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div>
                <textarea class="mb-8 h-16 bg-green-100 rounded-md" wire:model="newItemDescription"></textarea>
                @error('newItemDescription') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="px-4 py-3 bg-green-800 text-white">Save New Item</button>
        </form>
    </div>
</div>
