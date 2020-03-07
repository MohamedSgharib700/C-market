<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use Translatable;
    use SoftDeletes;
    public $translatedAttributes = ['name', 'description'];
    protected $table = "offers";
    protected $appends = ['name','description'];

    protected $fillable = [ 'image','discount','category_id','brand_id','feature'];

    public function getNameAttribute()
    {
        return $this->getTranslationByLocaleKey(app()->getLocale())->name;
    }



    public function Category()
    {

        return $this->belongsTo('\App\Models\Category' , 'category_id' );

    }

    public function brand()
    {

        return $this->belongsTo('\App\Models\Brand' , 'brand_id' );

    }



}
