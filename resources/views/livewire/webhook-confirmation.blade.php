<div>
    <div>
        <div class="text-3xl">Webhook Confirmation</div>
    </div>
    <div>
        {{ dd($result) }}
        @foreach ($result['content']['items'] as $item)
            {{ $item['name'] }}
        @endforeach
    </div>
</div>
