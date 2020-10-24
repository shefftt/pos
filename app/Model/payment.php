<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable = ['name'];
    protected $table = 'payment_methods';
}
