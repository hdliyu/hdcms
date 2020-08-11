<?php

namespace Modules\Edu\Entities;

use App\Models\Traits\Site;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Site;
    protected $fillable = ['title','site_id'];

    protected $table = 'edu_tag';

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
}
