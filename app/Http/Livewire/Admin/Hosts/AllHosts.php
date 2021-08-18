<?php

namespace App\Http\Livewire\Admin\Hosts;

use Livewire\Component;
use App\Models\Host;

class AllHosts extends Component
{
    public $hosts;
    public function mount()
    {
        $this->hosts = Host::with('items')->get();
    }


    public function render()
    {
        return view('livewire.admin.hosts.all-hosts')->layout('layouts.guest');
    }
}
