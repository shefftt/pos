<?php

namespace App\Model;

use App\User;
use http\Exception\BadConversionException;
use Illuminate\Database\Eloquent\Model;

class sales_invoice_h extends Model
{
    protected $fillable = ['customer_id', 'invoice_type' ,'reference' ,'total','vat_total', 'created_by','payment_method_id' ,'discount'];
    protected $table='sales_invoice_h';


    public function customer(){
        return $this->belongsTo(customer::class);
    }

    public function transaction()
    {
        return $this->morphMany(transaction::class, 'transactionable');
    }
    public function products()
    {
        return $this->hasMany(sales_invoice_d::class, 'invoice_id', 'id');
    }
    public function sales_invoice_d()
    {
        return $this->belongsTo(sales_invoice_d::class,'id','invoice_id');
    }

    public function payment(){

        return $this->belongsTo(payment::class,'payment_method_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }

}
