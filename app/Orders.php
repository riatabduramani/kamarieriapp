<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasModelTrait;
use DB;

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
        'type',
		'token',
		'device',
        'created_at',
		'seen'
	];

    public function history()
    {
        return $this->belongsTo('App\OrdersHistory');
    }

    public function sumCount()
    {
        //We use "hasOne" instead of "hasMany" because we only want to return one row.
        return $this->hasOne('App\OrdersHistory','order_id')->select(DB::raw('order_id, sum(price) as total'))->groupBy('order_id');
    }

}
