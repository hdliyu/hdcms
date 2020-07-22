<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['title'];

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
