<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WechatText extends Model
{
    protected $table = 'wechat_texts';
    protected $fillable = ['site_id', 'module_id', 'contents', 'rule_id'];

    protected $casts = [
        'contents' => 'array',
    ];

    public function rule()
    {
        return $this->belongsTo(WechatRule::class, 'rule_id');
    }
}
