<div>
    <div>
        <div class="text-3xl">Webhook Confirmation</div>
    </div>
    <div>
        @foreach ($result['content']['items'] as $item)
            echo $item
        @endforeach
    </div>
</div>
