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
       return Item::join('host_item', 'items.id', '=', 'host_item.item_id')
            ->select('name', DB::raw('SUM(host_item.item_quantity) as Quantity') )
            ->groupBy('name')
            ->where('host_item.host_id', '=', $this->id)
            ->get();
    }
}

