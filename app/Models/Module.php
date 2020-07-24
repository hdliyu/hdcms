<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['title','name','version','description','preview'];

    public function package()
    {
        return $this->belongsToMany(Package::class);
    }
}
