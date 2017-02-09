<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['name', 'price', 'category_id'];

    public function categories()
	{
		return $this->hasOne('App\Category', 'id', 'category_id');
	}

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient','product_ingredient');
    }
	
}
