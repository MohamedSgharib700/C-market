<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    protected $table = 'settings_translations';

    protected $fillable = ['description','setting_id'];
}
