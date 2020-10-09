<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name' ,'sub_id'];

    public function sub()
    {
        return $this->belongsTo(category::class, 'sub_id');
    }
    public function products(){
      return  $this->hasMany(product::class,'category_id','id');

    }

}
