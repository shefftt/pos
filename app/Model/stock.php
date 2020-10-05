<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $fillable = ['name' ,'status'];

    public function purchase_invoice_h(){

        return $this->hasMany(purchase_invoice_h::class);
    }

}
