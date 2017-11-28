<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = ['id', 'brand_name','image','slug'];


    public function products(){

        return $this->hasMany('App\Product');
    }

    public function stock(){

        return $this->hasMany("App\Stock" , 'brand_id' , 'id');
    }

    public function product(){

        return $this->hasMany("App\Product" , 'product_id' , 'id');
    }

    public function user(){

        return $this->hasMany("App\User" , 'user_id' , 'id');
    }
}
