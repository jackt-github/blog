<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table='plans';

    protected $fillable = [
        'html_content',
        'markdown_content'
    ];
}
