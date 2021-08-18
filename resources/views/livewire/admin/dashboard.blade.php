<div>
    @can('admin')
        You're an admin
    @elsecan('edit host')
        You're a host --  you're userId is {{ auth()->user()->id }}
    @endcan
</div>
