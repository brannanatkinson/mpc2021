<?php

namespace App\Http\Livewire\Admin\Hosts;

use Livewire\Component;
use App\Models\User;

class UpdateHostForm extends Component
{
    public $user;
    public function mount()
    {
        $this->user = auth()->user;
    }
    public function render()
    {
        return view('livewire.admin.hosts.update-host-form');
    }
}
