<?php

namespace Modules\Edu\Entities;

use App\User as AppUser;
use Illuminate\Database\Eloquent\Model;

class User extends AppUser
{
    public function signs()
    {
        return $this->hasMany(Sign::class);
    }

    public function getSignAttribute()
    {
        return $this->signs()->day()->where('user_id', $this['id'])->first();
    }

    public function getIsSignAttribute()
    {
        return $this->signs()->day()->where('user_id', $this['id'])->exists();
    }

    public function getSignTotalAttribute()
    {
        return $this->signs()->count();
    }

    public function getMonthSignAttribute()
    {
        return $this->signs()->month()->count();
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function studys()
    {
        return $this->hasMany(Study::class);
    }
}
