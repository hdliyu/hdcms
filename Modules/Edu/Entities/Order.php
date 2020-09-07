<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'edu_order';

    protected $fillable = ['site_id', 'price', 'user_id', 'subject', 'sn', 'type', 'month'];

    protected $casts = [
        'status' => 'boolean',
    ];
}
