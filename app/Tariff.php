<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tariff extends Model
{
    use HasTranslations;
    protected $fillable = [
        'name','ministra_id','type', 'price','detail','icon'
    ];
    protected $table = 'tariffs';
    public $translatable = ['name'];
    public $timestamps = true;
}
