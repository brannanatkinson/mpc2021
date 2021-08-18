<?php

namespace App\Http\Livewire\Admin\Hosts;

use Livewire\Component;
use App\Models\Host;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AllHosts extends Component
{
    public $hosts;
    public $name;
    public $email;
    public $updateMode = false;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
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
        $this->email = null;
    }
    public function store()
    {
        $this->validate();
        $newHost = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('password')
        ]);
        $newHost->givePermissionTo('edit host');
        $this->resetInput();
    }
}
