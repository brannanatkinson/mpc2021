<?php

namespace App\Http\Livewire\Admin\Hosts;

use Livewire\Component;
use App\Models\Host;

class AllHosts extends Component
{
    public $hosts;
    public $name, $email_address;
    public $updateMode = false;

    public function mount()
    {
        $this->hosts = Host::with('items')->get();
    }

    public function render()
    {
        return view('livewire.admin.hosts.all-hosts')->layout('layouts.guest');
    }
}
