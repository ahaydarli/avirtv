<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'login', 'account_number', 'password', 'license'
    ];

    public function order()
    {
        return $this->belongsTo(Subscription::class);
    }
}
