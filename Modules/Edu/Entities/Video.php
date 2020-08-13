<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Edu\Entities\Traits\Comment;
class Video extends Model
{
    use Comment;
    protected $fillable = [];
    protected $table = 'edu_videos';

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }



}
