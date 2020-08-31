<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $table = 'edu_study';
    protected $fillable = ['site_id','user_id','video_id','updated_at'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
