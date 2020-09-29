<?php

namespace App\model;

use App\Model\product;
use Illuminate\Database\Eloquent\Model;

class purchase_invoice_d extends Model
{
    protected $table = 'purchase_invoice_d';

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
