<?php

namespace Modules\Edu\Entities;

use App\Models\Traits\Site;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Sign extends Model
{
    use Site, LogsActivity;
    protected static $recordEvents = ['created'];
    protected static $logName = 'sign';

    protected $table = 'edu_sign';

    protected $fillable = ['content', 'mood', 'site_id'];

    public function scopeDay($query)
    {
        return $query->site()->whereYear('created_at', now())->whereMonth('created_at', now())->whereDay('created_at', now());
    }

    public function scopeMonth($query)
    {
        return $query->site()->whereYear('created_at', now())->whereMonth('created_at', now());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function signTotal()
    {
        return $this->hasOne(SignTotal::class,'user_id','user_id');
    }

    public function getLinkAttribute()
    {
        return route('edu.front.sign.index');
    }
}
