<div>
    @can('admin')
        <div>You're an admin</div>
        <div>{{ Request::segment(count(request()->segments()) }}</div>
    @elsecan('edit host')
        You're a host --  you're userId is {{ auth()->user()->id }}
    @endcan
</div>
