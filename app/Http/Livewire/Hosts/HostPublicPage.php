<?php

namespace App\Http\Livewire\Hosts;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;


use Livewire\Component;
use App\Models\User;

class HostPublicPage extends Component
{
    public $user;
    public function mount($url)
    {
        $this->user = User::where('host_url', '=', $url)->first();
        session([ 'host' => $this->user->name ]);
        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('Home');
        OpenGraph::setUrl('http://current.url.com');
    }
    public function render()
    {
        return view('livewire.hosts.host-public-page')->layout('layouts.guest');;
    }
}
