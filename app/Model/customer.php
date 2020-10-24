<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{

    protected $fillable = ['name', 'phone' ,'address' ];
    public function invoices_header(){

        return $this->hasMany(sales_invoice_h::class);
    }

    public function transaction()
    {
        return $this->hasManyThrough(
            'App\Model\transaction',
            'App\Model\sales_invoice_h',
            'customer_id', // Foreign key on users table...
            'transactionable_id', // Foreign key on posts table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }
}
