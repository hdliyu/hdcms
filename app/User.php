<?php

namespace App;

use App\Models\Group;
use App\Models\Site;
use App\Models\Traits\Favour;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Edu\Entities\Sign;
use Modules\Edu\Entities\SignTotal;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasApiTokens,Notifiable,HasRoles,Favour;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'github', 'qq', 'weibo','group_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function getAvatarAttribute()
    {
        return $this->avatar??'/images/avatar.jpg';
    }

    public function scopeSearch($query, $name)
    {
        if (empty($name))
            return $query;
        return $query->orWhere('name', 'like', "%{$name}%")
            ->orWhere('email', 'like', "%{$name}%")
            ->orWhere('mobile', 'like', "%{$name}%")
            ->orWhere('id', $name);
    }

    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    public function adminSites()
    {
        return $this->belongsToMany(Site::class, 'admin_site');
    }

    public function getAllSitesAttribute()
    {
        return $this->sites->merge($this->adminSites);
    }

    public function getIsSuperAdminAttribute()
    {
        return $this->id === 1;
    }

    public function make(User $user=null)
    {
        $class =  'Modules\\'.module()['name'].'\Entities\User';
        return $class::find($user['id']??$this['id']);
    }

    //粉丝
    public function fans()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id')->withTimestamps();
    }

    //关注的所有用户
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers',  'follower_id', 'user_id')->withTimestamps();
    }

    public function isFollower(User $user)
    {
        return $user->fans()->where('follower_id', $this['id'])->exists();
    }


}
