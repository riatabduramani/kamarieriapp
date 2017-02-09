<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ingredients';

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
    protected $fillable = ['name', 'price'];


    public function products()
    {
        return $this->belongsToMany('App\Product','product_ingredient');
    }
    
}
