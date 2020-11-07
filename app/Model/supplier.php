<?php

namespace App\Model;
use App\Model\transaction;
use App\Model\purchase_invoice_h;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $fillable = ['name', 'phone' ,'address' ];


    public function purchase_invoice()
    {
        return $this->hasMany(purchase_invoice_h::class, 'supplier_id', 'id');
    }


    public function transaction()
    {
        return $this->hasManyThrough(
            'App\Model\transaction',
            'App\Model\purchase_invoice_h',
            'supplier_id', // Foreign key on users table...
            'transactionable_id', // Foreign key on posts table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }


}
