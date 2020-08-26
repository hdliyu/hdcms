<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleConfig extends Model
{
    protected $table = 'module_configs';
    protected $fillable = [
        'site_id', 'config', 'module_id',
    ];
    protected $casts = [
        'config' => 'array'
    ];
}
