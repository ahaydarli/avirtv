<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'account_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // password and last insert_id from ministra
    protected function ministraPassword($password, $user_id)
    {
        $password = md5(md5($password).$user_id);
        return $password;
    }

    public static function generateAccountNumber()
    {
        return mt_rand(10000000, 99999999);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
}
