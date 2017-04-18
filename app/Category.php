<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @mixin \Eloquent
 */
class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['category'];
    protected $dateFormat = 'U';
}
