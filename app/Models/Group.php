<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['title','site_nums','days'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }

    public function hasPackage($package)
    {
        return $this->packages->contains($package);
    }

    public function getModulesAttribute()
    {
        return $this->packages()->with('modules')->get()->mapWithKeys(function($package){
            return $package->modules;
        });
    }
}
