<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class sales_invoice_d extends Model
{
    protected $fillable = ['vat' , 'sub_vat' ,'product_id','price','qyt','sub_total' ,'invoice_id'];
    protected $table = 'sales_invoice_d';

    public function product()
    {
        return $this->belongsTo(product::class);
    }
    public function header(){

        return $this->belongsTo(sales_invoice_h::class,'invoice_id','id');

    }

}
