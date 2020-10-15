<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    protected $table = 'edu_duration';
    protected $fillable = ['site_id', 'user_id', 'end_time'];

    protected $casts = [
        'end_time' => 'datetime',
    ];
}
