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
        OpenGraph::setDescription('Please help support Housing Hope, a fundraiser benefitting The Mary Parrish Center');
        OpenGraph::setTitle( $this->user->name . 'Supports Housing Hope' );
        OpenGraph::setUrl('https://housinghope.org/hosts/' . $this->user->host_url );
    }
    public function render()
    {
        return view('livewire.hosts.host-public-page')->layout('layouts.guest');;
    }
}
