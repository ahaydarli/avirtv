<?php

namespace App;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasTranslations;
    protected $fillable = [
        'title','text','is_active'
    ];
    protected $table = 'articles';
    public $translatable = ['title','text'];
    public $timestamps = true;
}
