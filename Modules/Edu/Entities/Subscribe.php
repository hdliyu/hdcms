<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table = 'edu_subscribe';
    protected $fillable = ['title','ad','icon','price','month'];

}
