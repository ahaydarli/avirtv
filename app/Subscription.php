<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscription';

    protected $fillable = [
        'user_id', 'package_id', 'account_number', 'payment_status', 'status',
        'device', 'period', 'mac_address', 'amount'
    ];

    public static function generateAccountNumber()
    {
        return mt_rand(10000000, 99999999);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->hasOne(Package::class, 'id','package_id');
    }

    public function service()
    {
        return $this->hasOne(Service::class, 'account_number', 'account_number');
    }

    public function month()
    {
        return $this->hasOne(Period::class, 'id', 'period');
    }

}
