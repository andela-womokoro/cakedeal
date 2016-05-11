<?php

namespace CakeDeal;

use Auth;
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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'user_id', 'name', 'description', 'price', 'image_url'];

    public function productCategory()
    {
        return $this->belongsTo('CakeDeal\ProductCategory');
    }

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

    public function user()
    {
        return $this->belongsTo('CakeDeal\User');
    }

    public function category()
    {
        return $this->belongsTo('CakeDeal\Category');
    }

    public function orders()
    {
        return $this->hasMany('CakeDeal\Order');
    }
}
