<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
<<<<<<< HEAD
=======
    use \App\Traits\Status;

>>>>>>> 40d742a38c48faf71506b963134e809f7e598aa3
    protected $table= 'license' ;
    protected $fillable = [
        'license','user_id','is_active', 'status'
    ];

    public $timestamps=true;

    public function User() {
        return $this->belongsTo(User::class);
    }
}
