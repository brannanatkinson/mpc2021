<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;
    protected $fillable = ['donor_id', 'order_token', 'gift_total', 'host_id'];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
