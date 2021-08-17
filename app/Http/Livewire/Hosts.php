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
            ->select('name')
            ->get();
    }


    public function render()
    {
        return view('livewire.hosts')->layout('layouts.guest');
    }
}
