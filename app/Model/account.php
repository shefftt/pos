<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    protected $fillable = ['name' ,'type'];

    public function transaction()
    {
        return $this->morphMany(transaction::class, 'transactionable');
    }
}
