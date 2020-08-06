<?php

namespace App\Models\Traits;

use App\User;
use Auth;

trait Favorite
{
    public function favorites()
    {
        return $this->morphToMany(User::class, 'favorite', 'favorite')->withTimestamps();
    }

    public function favorite()
    {
        $method = $this->isFavorite ? 'detach' : 'attach';

        $this->favorites()->$method([Auth::id()], [
            'site_id' => site()['id'],
            'module_Id' => module()['id']
        ]);

        $this->favorite_count = $this->favorites()->count();
        $this->save();
    }

    public function getIsFavoriteAttribute()
    {
        return $this->favorites()->wherePivot('user_id', user('id'))->exists();
    }
}
