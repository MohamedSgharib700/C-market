<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class SponsorTranslation extends Model
{
    protected $table = 'sponsors_translations';

    protected $fillable = ['name','sponsor_id'];
}
