<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table='coupons';
    protected $fillable=[
        'user_id','coupon','is_active','status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
