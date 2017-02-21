<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Traits\HasModelTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    use Notifiable;
    use HasModelTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'confirmed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function business()
    {
        return $this->hasOne('App\Business');
    }

    public function category()
    {
        return $this->hasOne('App\Category');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    

}
