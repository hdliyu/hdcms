<?php

namespace Modules\Edu\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'edu_comment';
    protected $fillable = ['site_id','user_id','content','reply_user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getHtmlAttribute()
    {
        $Parsedown = new \Parsedown();
        return clean($Parsedown->text($this->content));
    }

    public function getAvatarAttribute()
    {
        return $this->avatar??'/avatars/default.jpg';
    }

    public function replyUser()
    {
        return $this->belongsTo(User::class, 'reply_user_id');
    }
}
