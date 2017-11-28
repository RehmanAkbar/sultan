<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $table = 'product_tag';
    protected $fillable = [
        'product_id','tag_id'
    ];

    public function product(){

        return $this->belongsTo('App\Product',"id" , "product_id");

    }
}
