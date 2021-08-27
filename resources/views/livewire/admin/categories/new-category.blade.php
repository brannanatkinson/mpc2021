<div class="container">
    <div class="max-w-5xl mx-auto">
        <div class="text-3xl">
            Add a New Category
        </div>
        <form wire:submit.prevent="saveNewCategory" class="flex flex-col">
            <div class="mt-8 mb-6 flex flex-col">
                <label>Category Name</label>
                <input type="text" class="h-8 bg-green-100 rounded-md w-full" wire:model="name">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-6 flex flex-col">
                <label>Category Description</label>
                <textarea class="bg-green-100 rounded-md w-full" wire:model="description"></textarea>
            </div>
            <button type="submit" class="inline-flex px-4 py-3 bg-green-800 text-white">Save New Category</button>
        </form>
    </div>
</div>
