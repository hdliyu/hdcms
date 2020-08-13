<?php

namespace Modules\Edu\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'edu_comment';
    protected $fillable = ['site_id','user_id','content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
