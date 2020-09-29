<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $fillable = ['name', 'phone' ,'address' ];


    public function purchase_invoice()
    {
        return $this->hasMany(purchase_invoice_h::class, 'supplier_id', 'id');
    }

}
