<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
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
}
