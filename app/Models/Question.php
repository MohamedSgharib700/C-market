<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Question extends Model
{
    use Translatable;
    use SoftDeletes;
    protected $table = 'questions';
    public $translatedAttributes = ['name'];
    protected $fillable = ['active'];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->getTranslationByLocaleKey(app()->getLocale())->name;
    }
    public function answers()
    {
   
        return $this->hasMany(Answer::class);
    }
}
