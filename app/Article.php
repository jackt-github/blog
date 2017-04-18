<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Article
 *
 * @mixin \Eloquent
 */
class Article extends Model
{
    protected $table = 'article';

    protected $dateFormat = 'U';

    protected $fillable=[
    'title',
    'category_id',
    'markdown_content',
    'html_content',
    'published_at',
    'created_at',
    'updated_at'
    ];




//    protected function asDateTime($val)
//    {
//        return $val;
//    }
}
