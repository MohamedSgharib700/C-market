<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;
    use SoftDeletes;
    public $translatedAttributes = ['name'];
    protected $table = "categories";
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->getTranslationByLocaleKey(app()->getLocale())->name;
    }


    protected $fillable = [
        'name', 'image'
    ];

    public function brands()
    {

        return $this->belongsToMany('\App\Models\Brand','brand_category','category_id','brand_id');
    }

    public function offers(){

        return $this->hasMany('\App\Models\Offer' , 'category_id');
    }
}
