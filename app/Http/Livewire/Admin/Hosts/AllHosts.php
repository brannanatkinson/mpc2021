<?php

namespace App\Http\Livewire\Admin\Hosts;

use Livewire\Component;
use App\Models\Host;

class AllHosts extends Component
{
    public $hosts;
    public $name = 'brannan';
    public $email_address;
    public $newmessage = 'test';
    public $updateMode = false;

    protected $rules = [
        'name' => 'required|min:6',
        'email_address' => 'required|email',
    ];


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
        $this->validate();


        Host::create([
            'name' => $this->name,
            'email_address' => $this->email_address
        ]);
        $this->resetInput();
    }
}
