<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Package extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name', 'price', 'ministra_id', 'is_active'
    ];

    public $translatable = ['name'];
}
