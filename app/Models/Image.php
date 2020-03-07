<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";
    use SoftDeletes;

    protected $fillable = ['image'];
}
