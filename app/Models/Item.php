<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function gifts()
    {
        return $this->belongsToMany(Gitt::class);
    }

    public function hosts()
    {
        return $this->belongsToMany(Host::class)->withPivot(['item_quantity']);
    }
}

