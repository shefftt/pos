<?php

namespace App\model;
use App\Model\purchase_invoice_h;
use App\model\supplier;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillable = ['amount', 'from', 'to', 'transactionable_type', 'transactionable_id'];
    public function transactionable()
    {

        return $this->morphTo();
    }
}

