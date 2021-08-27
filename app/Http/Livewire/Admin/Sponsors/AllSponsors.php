<?php

namespace App\Http\Livewire\Admin\Sponsors;

use Livewire\Component;
use App\Models\Sponsor;

class AllSponsors extends Component
{
    public $sponsors;
    public $name, $category, $match, $gift, $image, $website;
    public $createMode = false;
    public $updateMode = false;

    public function mount()
    {
        $this->sponsors = Sponsor::orderBy('id')->get();
    }
    public function render()
    {
        return view('livewire.admin.sponsors.sponsor');
    }
}
