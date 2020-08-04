<?php

namespace Modules\Edu\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $table = 'edu_system';

    protected $fillable = ['title', 'preview', 'description'];

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'edu_system_lesson');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
