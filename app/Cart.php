<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'id', 'user_id', 'mobile','brand_id','product_id','status','state','city','address'
    ];
    public function user(){

        return $this->belongsTo('App\User');
    }
}
