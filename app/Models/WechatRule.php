<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WechatRule extends Model
{
    protected $table = 'wechat_rules';
    protected $fillable = ['site_id', 'module_id', 'wechat_id', 'type', 'module', 'title', 'options'];

    protected $casts = [
        'options' => 'array',
        'is_module' => 'boolean',
    ];

    public function keywords()
    {
        return $this->hasMany(WechatKeyword::class, 'rule_id');
    }

    public function text()
    {
        return $this->hasOne(WechatText::class, 'rule_id');
    }

    public function news()
    {
        return $this->hasOne(WechatNews::class, 'rule_id');
    }

    public function wechat()
    {
        return $this->belongsTo(Wechat::class, 'wechat_id');
    }
}
