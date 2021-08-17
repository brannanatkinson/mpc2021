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
        $sales = DB::table('items')
            ->join('gift_item', 'items.id', '=', 'gift_item.host_id')
            ->join('items', 'items.id', '=', 'gift_item.item_id')
            ->select('items.name as item_name', DB::raw('SUM(gift_item.item_quantity) as quantity') )
            ->groupBy('items.name')
            ->where('items.id', '=', $this->id )
            ->get();
        return $sales;
    }
}

