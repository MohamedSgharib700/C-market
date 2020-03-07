<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne as HasOneAlias;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Passport;
use Laravel\Passport\Token;
use Laravel\Passport\TokenRepository;

class User extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone', 'type', 'active','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'token','updated_at','created_at'
    ];

    /**
     * @param $pass
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = \Hash::make($pass);
    }





}
