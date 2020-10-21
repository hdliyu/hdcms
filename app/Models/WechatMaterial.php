<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WechatMaterial extends BaseModel
{
    protected $table = 'wechat_materials';

    protected $fillable = ['id', 'site_id', 'module_id', 'title', 'wechat_id', 'type', 'info', 'content'];

    protected $casts = [
        'info' => 'array',
        'content' => 'array',
    ];

    public function wechat()
    {
        return $this->belongsTo(Wechat::class, 'wechat_id');
    }
}
