<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Permission;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot(['item_quantity']);
    }

    public function totalDonationAmount()
    {
        $sales = DB::table('users')
            ->join('gifts', 'users.id', '=', 'gifts.user_id')
            ->select('users.name as user_name', DB::raw('SUM(gifts.gift_total) as sales') )
            ->groupBy('users.name')
            ->where('users.id', '=', $this->id )
            ->first();
        return $sales;
    }

    public function donatedItems()
    {
        $sales = DB::table('users')
            ->join('item_user', 'users.id', '=', 'item_user.user_id')
            ->join('items', 'items.id', '=', 'item_user.item_id')
            ->select('items.name as item_name', DB::raw('SUM(item_user.item_quantity) as quantity') )
            ->groupBy('items.name')
            ->where('users.id', '=', $this->id )
            ->get();
        return $sales;
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
