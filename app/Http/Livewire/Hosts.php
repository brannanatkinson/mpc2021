<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Hosts extends Component
{
    public $hosts;
    public function mount()
    {
        $this->hosts = DB::table('hosts')
            ->join('host_item', 'hosts.id', '=', 'host_item.host_id')
            ->join('items', 'items.id', '=', 'host_item.item_id')
            ->select('items.name as Item Name', DB::raw('SUM(host_item.item_quantity) as Quantity'), 'hosts.name' )
            ->groupBy('items.name')
            ->where('hosts.id', '=', 2)
            ->get();
    }


    public function render()
    {
        return view('livewire.hosts')->layout('layouts.guest');
    }
}
