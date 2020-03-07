<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class BrandTranslation extends Model
{
    protected $table = 'brands_translations';

    protected $fillable = ['name','brand_id'];
}
