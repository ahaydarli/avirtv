<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $table= 'license' ;
    protected $fillable = [
        'license','user_id','is_active', 'status'
    ];

    public $timestamps=true;

    public function User() {
        return $this->belongsTo(User::class);
    }
}
