<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;



class Brand extends Model
{
    use Translatable;
    use SoftDeletes;
    public $translatedAttributes = ['name'];
    protected $table = "brands";

    public $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->getTranslationByLocaleKey(app()->getLocale())->name;
    }


    public $fillable = [
         'image'
    ];


    public function categories()
    {

        return $this->belongsToMany('\App\Models\Category','brand_category','brand_id','category_id');
    }

    public function offers(){

        return $this->hasMany('\App\Models\Offer' , 'category_id');
    }

}
