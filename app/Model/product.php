<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['name' , 'vat', 'barcode' , 'category_id', 'status', 'purchase_price', 'sale_price', 'stock_id', 'qyt','unit_id'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function stock(){
     return  $this->belongsTo(stock::class);
    }

    public function unit(){
        return $this->belongsTo(unit::class);
    }

    public function sales(){
        return $this->hasMany(sales_invoice_d::class);
    }
    public function purchases(){
        return $this->hasMany(purchase_invoice_d::class);
    }
    public function purchase(){
        return $this->belongsTo(purchase_invoice_d::class,'id','product_id');
    }


}
