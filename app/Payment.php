<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const BE = 1;
    protected $fillable = [
        'user_id', 'subscription_id', 'type', 'period_id', 'amount', 'details', 'status'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class,'id', 'subscription_id');
    }

    public function period()
    {
        return $this->hasOne(Period::class,'id','period_id');
    }
}
