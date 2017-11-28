<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    protected $dates = ['deleted_at'];
    protected $table = 'orders';
    protected $fillable = ['id', 'user_id','brand_id','product_id','price_id','first_name','last_name','country','state',
        'city','address','zip_code','mobile_number','valid_till','status'];
}
