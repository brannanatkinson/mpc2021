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
        return $this->belongsToMany(Item::class)->withPivot(['item_quantity']);
    }
    public function sales()
    {
        return Host::with(['items' => function($query) {
            $query->select('items.name');
            $query->where('host_item.host_id', '=', $this->id);
        }])->get();
    }
}



