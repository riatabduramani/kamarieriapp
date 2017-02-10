<?php

namespace App;
use App\Scopes\UserdataScope;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'business';

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
    protected $fillable = ['name', 'address', 'country', 'zip', 'city', 'web', 'phone','nr_tables', 'user_id'];


	public function user()
    {
        return $this->belongsTo('App\User');
    }


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new UserdataScope);
    }
}
