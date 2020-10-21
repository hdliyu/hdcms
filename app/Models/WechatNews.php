<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WechatNews extends BaseModel
{
    protected $table = 'wechat_news';
    protected $fillable = ['site_id', 'module_id', 'contents', 'rule_id'];

    protected $casts = [
        'contents' => 'array',
    ];

    public function rule()
    {
        return $this->belongsTo(WechatRule::class, 'rule_id');
    }
}
