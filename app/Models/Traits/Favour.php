<?php

namespace App\Models\Traits;

use App\User;
use Auth;

trait Favour
{
    public function favours()
    {
        return $this->morphToMany(User::class, 'favour', 'favour')->withTimestamps();
    }

    public function favour()
    {
        $method = $this->isfavour ? 'detach' : 'attach';

        $this->favours()->$method([Auth::id()], [
            'site_id' => site()['id'],
            'module_Id' => module()['id']
        ]);

        $this->favour_count = $this->favours()->count();
        $this->save();
    }

    public function getIsfavourAttribute()
    {
        return $this->favours()->wherePivot('user_id', user('id'))->exists();
    }
}
