<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Setting extends Model
{
    use Translatable;
    use SoftDeletes;
    protected $table = 'settings';
    public $translatedAttributes = ['description'];
    protected $fillable = ['active'];
    protected $appends = ['description'];

    public function getDescriptionAttribute()
    {
        return $this->getTranslationByLocaleKey(app()->getLocale())->description;
    }
   
}
