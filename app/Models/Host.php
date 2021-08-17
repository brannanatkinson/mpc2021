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
       return Item::select('items.*')->join('host_item', 'items.id', '=', 'host_item.item.id')->get();
    }
}

