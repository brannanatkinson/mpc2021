<div class="container">
    <div class="max-w-5xl mx-auto">
        <div class="text-3xl">
            Update Item - {{ $selected_item }}
        </div>
        <form wire:submit.prevent="update" class="flex flex-col">
            <div class="flex flex-col">
                <label>Item Name</label>
                <input type="text" class="mb-8 h-16 bg-green-100 rounded-md w-full" wire:model="name">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label>Item Excerpt</label>
                <textarea class="mb-8 h-32 bg-green-100 rounded-md w-full" wire:model="excerpt"></textarea>
                @error('excerpt') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label>Item Description</label>
                <textarea class="mb-8 h-32 bg-green-100 rounded-md w-full" wire:model="description"></textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label>Item Category</label>
                <select name="" id="" wire:model="category">
                    <option value="0">--</option>
                    @foreach ( App\Models\Category::orderBy('id')->get() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label>Item Img</label>
                <input type="file" wire:model="image"></textarea>
                @error('image') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="inline-flex px-4 py-3 bg-green-800 text-white">Update Item</button>
        </form>
    </div>
</div>
