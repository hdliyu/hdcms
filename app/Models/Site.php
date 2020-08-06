<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Site extends Model
{
    protected $fillable = ['title', 'https', 'domain', 'module_id'];

    protected $casts = [
        'config' => 'array'
    ];

    public function master()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function admins()
    {
        return $this->belongsToMany(User::class,'admin_site')->withTimestamps();
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}
