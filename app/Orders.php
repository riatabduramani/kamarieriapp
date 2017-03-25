<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasModelTrait;

class Orders extends Model
{
    use HasModelTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

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
    	'business_id',
		'table_nr',
		'customer_nr',
		'device',
		'seen'
	];

    public function history()
    {
        return $this->belongsTo('App\OrdersHistory');
    }
}
