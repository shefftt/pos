<?php

namespace App\model;

use App\Model\stock;
use Illuminate\Database\Eloquent\Model;

class purchase_invoice_h extends Model
{
    protected $table = 'purchase_invoice_h';

    public function products()
    {
        return $this->hasMany(purchase_invoice_d::class, 'invoice_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }

    public function stock()
    {
        return $this->belongsTo(stock::class);
    }
}
