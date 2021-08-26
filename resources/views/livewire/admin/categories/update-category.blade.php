<div class="container">
    <div class="max-w-5xl mx-auto">
        <div class="text-3xl">
            Update Category
        </div>
        <form wire:submit.prevent="update" class="flex flex-col">
            <div class="flex flex-col">
                <label>Category Name</label>
                <input type="text" class="mb-8 h-16 bg-green-100 rounded-md w-full" wire:model="name">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label>Category Description</label>
                <textarea class="mb-8 h-32 bg-green-100 rounded-md w-full" wire:model="description"></textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="inline-flex px-4 py-3 bg-green-800 text-white">Update Category</button>
        </form>
    </div>
</div>
