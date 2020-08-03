<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [];
    protected $table = 'edu_lessons';

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
