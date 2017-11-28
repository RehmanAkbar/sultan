<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $table = 'queues';
    protected $fillable = [
        'id', 'user_id', 'brand_id','product_id','month','year','status','month_number'
    ];

    function getProduct(){

        $q = Queue::where('user_id', $this->user_id)
            ->where('month', $this->month)
            ->where('status', "pending")
            ->where('year', $this->year)
            ->orderBy('month_number')
            ->get()->pluck('product_id');

        $product = Product::whereIn('id', $q)->get();

        return $product;
    }

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }

    public function products(){

        return $this->hasOne('App\Product','id' ,'product_id');
    }
    public function brand(){

        return $this->hasOne('App\Brand','id' ,'brand_id');
    }


}
