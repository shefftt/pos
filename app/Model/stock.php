<?php

namespace App\Model;

use App\model\stock_product;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $fillable = ['name' ,'status'];

    public function purchase_invoice_h(){

        return $this->hasMany(purchase_invoice_h::class);
    }
   public function purchase_invoice_d(){
        return $this->hasManyThrough(purchase_invoice_d::class , purchase_invoice_h::class,'stock_id', 'invoice_id','id','id' ,stock::class);
    }

    public function stock_product()
    {
        return $this->hasMany(stock_product::class);
    }









}
