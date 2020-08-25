<?php

namespace Modules\Edu\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Comment extends Model
{
    use LogsActivity;
    protected static $recordEvents = ['created'];
    protected static $logName = 'comment';
    protected $table = 'edu_comment';
    protected $fillable = ['site_id','user_id','content','reply_user_id'];

    public function commentable()
    {
        return $this->morphTo('comment');
    }

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
