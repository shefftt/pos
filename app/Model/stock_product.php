<?php

namespace App\model;

use App\Model\product;
use App\Model\stock;
use Illuminate\Database\Eloquent\Model;

class stock_product extends Model
{
    protected $fillable = ['product_id' ,'stock_id','qyt'];
    protected $table = 'stock_products';

    public function stock()
    {
        return $this->belongsTo(stock::class);
    }

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
