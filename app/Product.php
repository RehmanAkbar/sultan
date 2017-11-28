<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['id', 'brand_id','product_name','image','style','occasion','quantity','men','women','bestSeller','newArrivals','Featured','description','short_description'];

    protected $dates = ['deleted_at'];


    public function brand(){

        return $this->hasOne("App\Brand" ,"id" ,"brand_id");
    }
    public function tags(){

        return $this->hasMany("App\ProductTag","product_id" , "id");
    }


    public function getProductNameAttribute($value)
    {
        return ucfirst($value);
    }

    
}
