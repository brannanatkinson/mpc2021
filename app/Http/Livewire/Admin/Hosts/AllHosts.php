<?php

namespace App\Http\Livewire\Admin\Hosts;

use Livewire\Component;
use App\Models\Host;

class AllHosts extends Component
{
    public $hosts;
    public $form_name = 'brannan';
    public $form_email_address;
    public $updateMode = false;

    public function mount()
    {
        $this->hosts = Host::with('items')->get();
    }

    public function render()
    {
        return view('livewire.admin.hosts.all-hosts')->layout('layouts.guest');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->email_address = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'email_address' => 'required|email'
        ]);
        $newHost = Host::create([
            'name' => $this->name,
            'email_address' => $this->email_address
        ]);
        $this->resetInput();
    }
}
