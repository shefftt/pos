<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $fillable = ['name' ,'status'];

    public function purchase_invoice_h(){

        return $this->hasMany(purchase_invoice_h::class);
    }
    public function purchase_invoice_d(){

        return $this->hasManyThrough(purchase_invoice_d::class,purchase_invoice_h::class,'stock_id','invoice_id','id','id');
    }

}
