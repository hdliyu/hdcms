<?php

namespace Modules\Edu\Entities;
use App\Models\Traits\Favorite;
use App\Models\Traits\Favour;
use App\Models\Traits\Site;
use App\User;
use Illuminate\Database\Eloquent\Model;
use function route;

class Lesson extends Model
{
    const type = '课程';
    use Site,Favorite,Favour;
    protected $fillable = ['title', 'description', 'thumb', 'status', 'download_address', 'free_num'];
    protected $table = 'edu_lessons';

    protected $casts = [
        'status'=>'boolean',
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class,'relation','edu_tag_relation');
    }

    public function videos()
    {
        return $this->hasMany(Video::class)->orderBy('rank', 'asc');
    }

    public function scopeSearch($query, $w)
    {
        return $query->where('id', 'like', "%{$w}%")->orWhere('title', 'like', "%{$w}%");
    }

    public function scopeSearchTag($query, $tag = null)
    {
        if (is_null($tag)) return $query;

        return $this->whereHas('tags', function (Builder $query) use ($tag) {
            $query->where('title', $tag);
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getLinkAttribute()
    {
        return route('edu.front.lesson.show', $this);
    }
}
