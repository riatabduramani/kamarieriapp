<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersHistory extends Model
{
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_history';

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
    protected $fillable = [
			'order_id',
			'product_name',
			'price',
			'ingredients'
		];

    public function orders()
    {
        return $this->hasMany('App\Orders', 'id', 'order_id');
    }

}
