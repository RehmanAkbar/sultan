<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';
    protected $fillable = ['id', 'brand_id','product_id','price','tax','shipping'];
}
