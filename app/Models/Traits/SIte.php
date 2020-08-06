<?php

namespace App\Models\Traits;

trait Site
{
    public function scopeSite($query)
    {
        return $query->where('site_id', site()['id']);
    }
}
