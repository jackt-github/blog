<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialUsers extends Model
{
    protected $table = 'socialUsers';
    public $timestamps = false;
    protected $fillable = [
        'platform',
        'social_uid',
        'nick_name',
        'email',
        'user_url',
        'pic_url',
        'created_at'
    ];
}
