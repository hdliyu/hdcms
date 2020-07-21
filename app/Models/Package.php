<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['title'];

    public function module()
    {
        return $this->belongsToMany(Module::class);
    }
}
