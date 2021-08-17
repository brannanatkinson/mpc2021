<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Host;

class Hosts extends Component
{
    public $hosts;
    public function mount()
    {
        $this->hosts = Host::all();
    }


    public function render()
    {
        return view('livewire.hosts')->layout('layouts.guest');
    }
}
