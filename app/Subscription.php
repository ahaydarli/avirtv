<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscription';

    protected $fillable = [
        'user_id', 'package_id'
    ];

}
