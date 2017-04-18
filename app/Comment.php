<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Comment
 *
 * @mixin \Eloquent
 */
class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';
    //设置主键
    public $primaryKey = 'id';

    //设置日期时间格式
    public $dateFormat = 'U';

//    protected $guarded = ['id','created_at'];

    protected $fillable=['uid','parent_id','article_id','content','created_at'];

    protected $dates = ['delete_at'];
}
