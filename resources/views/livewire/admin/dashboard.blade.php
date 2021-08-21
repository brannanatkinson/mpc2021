<div>
    @can('admin')
        <div>You're an admin</div>
    @elsecan('edit host')
        You're a host --  you're userId is {{ auth()->user()->id }}
    @endcan

    

</div>
