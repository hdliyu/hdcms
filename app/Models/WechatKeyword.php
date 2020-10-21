<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WechatKeyword extends BaseModel
{
    protected $table = 'wechat_keywords';

    protected $fillable = ['id', 'site_id', 'module_id', 'wechat_id', 'rule_id', 'word', 'regexp'];

    protected $casts = [
        'regexp' => 'boolean',
    ];

    public function rule()
    {
        return $this->belongsTo(WechatRule::class, 'rule_id');
    }
}
