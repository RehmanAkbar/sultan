<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ref extends Model
{
    //
    protected $table = 'reference';
    protected $fillable = ['id', 'user_id','refer_id','points','points_used','points_un_used','is_active'];
}
