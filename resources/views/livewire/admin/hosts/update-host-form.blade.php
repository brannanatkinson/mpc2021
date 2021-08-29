<div>
    <div class="max-w-5xl mx-auto">
        @if( $show_alert )
        <div class="mb-8">
            <div class="p-4 bg-mp-blue-green text-white">Your profile was updated.</div>
        </div>
        @endif
        @if ( $image )
        <div class="mb-8 mx-auto h-24 w-24 rounded-full overflow-hidden">
            <img src="{{ Storage::url( $image ) }}" class="object-cover" alt="">
        </div>
        @endif
        <div class="mb-8">
            <div class="text-3xl text-center">Profile for {{ $user->name }}</div>
        </div>
        <div class="mb-8">
            <p>This form will help you update your public Housing Hope profile.</p>
        </div>
        <div class="mb-8">
            <div class="mb-4 text-2xl">Add Your Photo</div>
            <div class="mb-4 flex flex-col">
                <label class="mb-4">Add a photo that will show on your public profile</label>
                <input type="file" wire:model="image"  >
            </div>
            <button wire:click.prevent="saveUserPhoto" class="px-4 py-3 text-white bg-mp-blue-green">Save Your Photo</button>
        </div>
        <div class="mb-8">
            <div class="text-2xl">Show Host Totals</div>
            <p>This is the total amound of donations where users have credited you as the virtual hosts</p>
            <input class="h-8 w-8" wire:click.prevent="saveUserShowTotal" value="{{ $show_total }}" wire:model="show_total" type="checkbox">
            <label for="">Check to show donation total</label>
        </div>
        <div class="mb-8">
            <div class="text-2xl">Show Your Goal</div>
            <p>Enter an amount if you would like to show a goal on your public profile. Please leave blank if you don't want to show a goal.</p>
            <label for="">Show your goal on your public page</label>
            <input type="checkbox" wire:click.prevent="saveUserShowGoal" value="{{ $show_goal }}" wire:model="show_goal"><br/>
            <label for="">Enter your goal amount</label>
            <input type="number" wire:model="goal"><br/>
            <button wire:click.prevent="saveUserGoal" class="px-4 py-3 text-white bg-mp-blue-green">Save Goal</button>
        </div>
        <div class="mb-8">
            <div class="text-2xl">Show Donated Items</div>
            <p>This is option will show users the items that people have donated when crediting you as the host.</p>
             <input type="checkbox" wire:click.prevent="saveUserShowItems" value="{{ $show_items }}" wire:model="show_items"><br/>
            <label for="">Check to show items</label>
        </div>
        <div class="mb-8">
            <div class="text-2xl">Show Reason for Supporting Housing Hope</div>
            <p>Write a statement about why you support The Mary Parrish Center or any message you want visitiors to see.</p>
            <label for="">Show your message of support on your public page</label>
            <input type="checkbox" wire:click.prevent="saveUserShowRationale" value="{{ $show_rationale }}" wire:model="show_rationale"><br/>
            <textarea class="w-full" rows="7" wire:model="rationale"></textarea>
            <button wire:click.prevent="saveUserRationale" class="px-4 py-3 text-white bg-mp-blue-green">Save Message</button>
        </div>
    </div>
    
</div>
