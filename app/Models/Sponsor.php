<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Sponsor extends Model
{
    use Translatable;
    use SoftDeletes;
    protected $table = 'sponsors';
    public $translatedAttributes = ['name'];
    protected $fillable = ['image', 'active'];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->getTranslationByLocaleKey(app()->getLocale())->name;
    }

}
