<?php

namespace Modules\Edu\Entities;

use App\Models\Site;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    protected $table = 'edu_sign';
    protected $fillable = ['mood','content'];




    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
