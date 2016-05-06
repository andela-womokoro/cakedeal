<?php

namespace CakeDeal;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category'];

    public function products()
    {
        return $this->hasMany('CakeDeal\Product');
    }
}
