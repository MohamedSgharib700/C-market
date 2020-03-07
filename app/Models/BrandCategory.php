<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class BrandCategory extends Model
{
    use SoftDeletes;
    protected $table = "brand_category";



    public function offers(){

        return $this->hasMany('\App\Models\Offer' , 'brand_category_id');
    }
}
