<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class sales_invoice_h extends Model
{
    protected $table='sales_invoice_h';
    public function customer(){
        return $this->belongsTo(customer::class);
    }
}
