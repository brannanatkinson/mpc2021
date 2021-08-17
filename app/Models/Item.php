<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function sales()
    {
        $sales = DB::table('items')->get();
        return $sales;
    }
}

