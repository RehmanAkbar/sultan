<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $fillable = ['id', 'brand_id','product_id','user_id'];


    public function brand(){

        return $this->belongsTo('App\Brand');

    }
    public function product(){

        return $this->belongsTo('App\Product');

    }
    public function user(){

        return $this->belongsTo('App\User');

    }
}
