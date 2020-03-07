<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Answer extends Model
{
    
    use SoftDeletes;
    protected $table = 'answers';
    protected $fillable = ['user_id', 'question_id', 'answer'];


}
