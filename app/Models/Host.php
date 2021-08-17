<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    use HasFactory;
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function sales()
    {
        return DB::table('hosts')
            ->join('host_item', 'hosts.id', '=', 'host_item.host_id')
            ->join('items', 'items.id', '=', 'host_item.item_id')
            ->select('items.name as Item Name', DB::raw('SUM(host_item.item_quantity) as Quantity'), 'hosts.name' )
            ->groupBy('hosts.name')
            ->where('hosts.id', '=', $this->id)
            ->get();
    }
}
