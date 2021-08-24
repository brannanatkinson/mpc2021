<?php

namespace App\Http\Livewire\Hosts;

use Livewire\Component;
use App\Models\User;

class HostPublicPage extends Component
{
    public $user;
    public function mount($url)
    {
        $this->user = User::where('host_url', '=', $url);
    }
    public function render()
    {
        return view('livewire.hosts.host-public-page')->layout('layouts.guest');;
    }
}
