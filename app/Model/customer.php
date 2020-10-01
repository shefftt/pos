<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    public function invoices_header(){

        return $this->hasMany(sales_invoice_h::class);
    }
}
