<?php

namespace Modules\Edu\Entities;
use App\User as AppUser;
use Illuminate\Database\Eloquent\Model;
use function site;

class User extends AppUser
{
    public function getIsSignAttribute()
    {
        return $this->signs()->day()->exists();
    }

    public function getPrevSignAttribute()
    {
        return $this->signs()->site()->orderBy('created_at','desc')->limit(1,1)->value('created_at')->diffForHumans();
    }

    public function getMonthSignAttribute()
    {
        return $this->signs()->month()->count();
    }

    public function getTotalSignAttribute()
    {
        return $this->signs()->site()->count();
    }

    public function signs()
    {
        return $this->hasMany(Sign::class);
    }

    public function totalSigns()
    {
        return $this->hasOne(SignTotal::class)->where('site_id',site()['id']);
    }
}
