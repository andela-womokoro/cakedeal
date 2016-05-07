<?php

namespace CakeDeal;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'product_id', 'quantity', 'message',

    'delivery_date'];

    /**
     * Set scope for personal cakes.
     *
     * @param  string
     *
     * @return string
     */
    public function scopePersonal($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }
}
