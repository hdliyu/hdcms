<?php

namespace Modules\Edu\Entities;

use App\Models\Traits\Favorite;
use App\Models\Traits\Favour;
use Illuminate\Database\Eloquent\Model;
use Modules\Edu\Entities\Traits\Comment;
class Video extends Model
{
    const type = '视频';
    use Comment,Favorite,Favour;
    protected $fillable = [];
    protected $table = 'edu_videos';

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function getPrevAttribute()
    {
        $videos = $this->lesson->videos;
        foreach ($videos as $index => $video) {
            if ($video->id === $this->id) {
                return $index === 0 ? null : $videos[$index - 1];
            }
        }
    }

    public function getNextAttribute()
    {
        $videos = $this->lesson->videos;
        foreach ($videos as $index => $video) {
            if ($video->id === $this->id) {
                return ($index + 1) === $videos->count() ? null : $videos[$index + 1];
            }
        }
    }

    public function user()
    {
        return $this->lesson->user();
    }

    public function getLinkAttribute()
    {
        return route('edu.front.video.show', $this);
    }

    public function visitors()
    {
        return $this->belongsToMany(User::class,'edu_study','video_id','user_id')->withTimestamps()->using(Study::class);
    }
}
