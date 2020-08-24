<?php

namespace Modules\Edu\Entities;

use App\Models\Site;
use Modules\Edu\Entities\User;
use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{

    protected $table = 'edu_sign';
    protected $fillable = ['mood','content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSite($query)
    {
        return $query->where('site_id',site()['id']);
    }

    public function scopeYear($query)
    {
        return $query->site()->whereYear('created_at',now());
    }

    public function scopeMonth($query)
    {
        return $query->year($query)->whereMonth('created_at',now());
    }

    public function scopeDay($query)
    {
        return $query->month()->whereDay('created_at',now());
    }


}
