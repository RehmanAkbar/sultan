<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tages';
    protected $fillable = ['id', 'tag_name','type','image','slug'];
}
