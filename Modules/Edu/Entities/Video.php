<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [];
    protected $table = 'edu_videos';

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
