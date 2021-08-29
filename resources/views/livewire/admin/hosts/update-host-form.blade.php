<div>
    <div class="max-w-5xl mx-auto">
        <div class="mb-8">
            <div class="text-3xl text-center">Profile for {{ $user->name }}</div>
        </div>
        <div class="mb-8">
            <p>This form will help you update your public Housing Hope profile.</p>
        </div>
        <div class="mb-8">
            <div class="text-2xl">Show Host Totals</div>
            <p>This is the total amound of donations where users have credited you as the virtual hosts</p>
            <input type="checkbox">
            <label for="">Check to show donation total</label>
        </div>
        <div class="mb-8">
            <div class="text-2xl">Show Your Goal</div>
            <p>Enter an amount if you would like to set a goal for the amount you want to raise. Please leave blank if you don't want to show a goal.</p>
            <label for="">Enter your goal amount</label>
            <input type="text"><br/>
            <button class="px-4 py-3 text-white bg-mp-blue-green">Save Goal</button>
        </div>
        <div class="mb-8">
            <div class="text-2xl">Show Donated Items</div>
            <p>This is option will show users the items that people have donated when crediting you as the host.</p>
            <input type="checkbox">
            <label for="">Check to show items</label>
        </div>
        <div class="mb-8">
            <div class="text-2xl">Show Reason for Supporting Housing Hope</div>
            <p>Write a statement about why you support The Mary Parrish Center or any message you want visitiors to see.</p>
            <textarea class="w-full" rows="7"></textarea>
            <button class="px-4 py-3 text-white bg-mp-blue-green">Save Message</button>
        </div>
    </div>
    
</div>
