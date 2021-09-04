<div class="container">
    <div class="max-w-5xl mx-auto">
        <div class="text-3xl">
            Add a New Sponsor
        </div>
        <form wire:submit.prevent="saveNewSponsor" class="flex flex-col">
            <div class="mt-6 mb-6 flex flex-col">
                <label>Sponsor Name</label>
                <input type="text" class="h-8 bg-green-100 rounded-md w-full" wire:model="name">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-6 flex flex-col">
                <label>Sponsor Category</label>

                <select name="" id="" wire:model="category">
                    <option value="title">Title</option>
                    <option value="catalog">Giving Catalog</option>
                    <option value="wall">Giving Wall</option>
                    <option value="champion">Champion of Hope</option>
                    <option value="matching">Matching</option>
                    <option value="promoter">Promoter of Hope</option>
                    <option value="advocate">Advocate of Hope</option>
                    <option value="bearer">Bearer of Hope</option>
                    <option value="supporter">Supporter of Hope</option>
                </select>
            </div>
            <div class="mb-6 flex flex-col">
                <label>Sponsor Amount</label>
                <input type="number" class="h-8 bg-green-100 rounded-md w-full" wire:model="amount">
            </div>
            <div class="mb-6 text-2xl">
                Add the Sponsor Match
            </div>
            
            <div class="mb-6 flex flex-col">
                <label>Matched Catalog Item</label>
                <select name="" id="" wire:model="item">
                    @foreach( App\Models\Item::orderBy('id')->get() as $item )
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6 flex flex-col">
                <label>Sponsor Website</label>
                <input type="text" class="h-8 bg-green-100 rounded-md w-full" wire:model="website">
            </div>
            <div class="mb-6 flex flex-col">
                <label>Sponsor Image</label>
                <input type="file" wire:model="image"></textarea>
            </div>
            <button type="submit" class="inline-flex px-4 py-3 bg-green-800 text-white">Save New Sponsor</button>
        </form>
    </div>
</div>
