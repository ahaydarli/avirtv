<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const BE = 1;
    const KOMTEC = 2;
    const ONLINE = 3;

    protected $fillable = [
        'user_id', 'subscription_id', 'type', 'period_id', 'amount', 'details', 'status'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
}
