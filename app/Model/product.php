<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public $fillable = ['name' , 'vat', 'ratio' ,'barcode' , 'category_id', 'status', 'purchase_price', 'sale_price', 'qyt','unit_id'];

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
    public function sale(){

        return $this->belongsTo(sales_invoice_d::class,'id','product_id');
    }
    public function sales_header(){

        return $this->belongsTo(sales_invoice_h::class,'id');
    }

    public function purchases(){
        return $this->hasMany(purchase_invoice_d::class);
    }
    public function purchase(){
        return $this->belongsTo(purchase_invoice_d::class,'id','product_id');
    }


}
