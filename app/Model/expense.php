<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    protected $table='expenses';
    protected $fillable = ['expense_category_id','stock_id','amount','note','account_id','initial_balance' ];
    public function expense_category(){

        return $this->belongsTo(expense_category::class);
    }

    public function stock(){

        return $this->belongsTo(stock::class);
    }
    public function account(){

        return $this->belongsTo(account::class);

    }
}
