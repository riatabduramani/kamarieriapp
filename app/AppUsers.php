<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUsers extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_users';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'device', 'status', 'confirmed'];

}
