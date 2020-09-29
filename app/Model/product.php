<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['name', 'category_id', 'status', 'purchase_price', 'sale_price', 'stock_id', 'qyt'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}