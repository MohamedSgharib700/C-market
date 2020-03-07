<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class QuestionTranslation extends Model
{
    protected $table = 'questions_translations';

    protected $fillable = ['name','question_id'];
}
