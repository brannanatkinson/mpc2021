<div>
    <div>Public page for {{ $user->name }}</div>
    <div>
        @if(Session::has('host'))
        <div class="text-3xl">
          {{ Session::get('host')}}
        </div>
        @endif

    </div>
</div>
