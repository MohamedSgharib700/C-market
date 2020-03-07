<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class OfferTranslation extends Model
{
    protected $table = 'offers_translations';

    protected $fillable = ['name','description','offer_id'];
}
