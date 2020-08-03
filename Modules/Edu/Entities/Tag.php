<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title','site_id'];

    protected $table = 'edu_tags';

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
}
