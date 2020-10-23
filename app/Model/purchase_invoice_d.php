<?php

namespace App\model;

use App\Model\product;
use Illuminate\Database\Eloquent\Model;

class purchase_invoice_d extends Model
{

    protected $fillable = ['product_id','price','qyt', 'current_qyt' , 'sub_total' , 'vat' , 'sub_vat' ,'invoice_id' ,'payment_method_id'];
    protected $table = 'purchase_invoice_d';

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function invoice()
    {
        return $this->belongsTo(purchase_invoice_h::class);
    }
}
