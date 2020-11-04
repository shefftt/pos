<?php

namespace App\Model;

use App\Model\stock;
use App\Model\payment;
use Illuminate\Database\Eloquent\Model;

class purchase_invoice_h extends Model
{


    protected $fillable = ['supplier_id', 'total', 'stock_id', 'created_by' , 'invoice_number' , 'payment_method_id'];
    protected $table = 'purchase_invoice_h';

    public function products()
    {
        return $this->hasMany(purchase_invoice_d::class, 'invoice_id', 'id');
    }
    public function purchase_invoice_d()
    {
        return $this->belongsTo(purchase_invoice_d::class,'id');
    }


    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }
    public function payment(){

        return $this->belongsTo(\App\model\payment::class,'payment_method_id');
    }

    public function stock()
    {
        return $this->belongsTo(stock::class);
    }
    public function payment_method()
    {
        return $this->belongsTo(payment::class);
    }
    public function transaction()
    {
        return $this->morphMany(transaction::class, 'transactionable');
    }



}
