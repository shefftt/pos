<?php

namespace App\Model;

use App\model\payment;
use Illuminate\Database\Eloquent\Model;

class sales_invoice_h extends Model
{
    protected $fillable = ['customer_id', 'total', 'created_by','payment_method_id'];
    protected $table='sales_invoice_h';


    public function customer(){
        return $this->belongsTo(customer::class);
    }

    public function transaction()
    {
        return $this->morphMany(transaction::class, 'transactionable');
    }
    public function payment()
    {
        return $this->belongsTo(payment::class, 'payment_method_id' , 'id');
    }
    public function products()
    {
        return $this->hasMany(sales_invoice_d::class, 'invoice_id', 'id');
    }


}
