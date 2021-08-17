<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Item;


class Host extends Model
{
    use HasFactory;
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function sales()
    {
        $sales = Item::with('host')->whereId($this->id)->get();
        return $sales;
    }
}

