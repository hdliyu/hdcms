<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ['title', 'domain', 'module_id'];

    protected $casts = [
        'config' => 'array'
    ];

    public function master()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
