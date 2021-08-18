<div>
    @can('admin')
        You're an admin
    @elsecan('edit host')
        You're a host
    @endcan
</div>
