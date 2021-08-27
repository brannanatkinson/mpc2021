<?php

namespace App\Http\Livewire\Admin\Sponsors;

use Livewire\Component;

class Sponsor extends Component
{
    public $name, $category, $match, $gift, $image, $website;
    public function render()
    {
        return view('livewire.admin.sponsos.sponsor');
    }
}
