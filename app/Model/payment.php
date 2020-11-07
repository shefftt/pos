<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable = ['name'];
    protected $table = 'payment_methods';
}
