<div class="container">
    <div class="max-w-5xl mx-auto">
        <div class="text-3xl">
            Add a New Item
        </div>
        <form wire:submit.prevent="saveNewItem" class="flex flex-col">
            <div class="flex flex-col">
                <label>Item Name</label>
                <input type="text" class="mb-8 h-16 bg-green-100 rounded-md w-full" wire:model="newItemName">
                @error('newItemName') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label>Item Description</label>
                <textarea class="mb-8 h-32 bg-green-100 rounded-md w-full" wire:model="newItemDescription"></textarea>
                @error('newItemDescription') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="inline-flex px-4 py-3 bg-green-800 text-white">Save New Item</button>
        </form>
    </div>
</div>
