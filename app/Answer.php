<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'problem_id', 'ansewr', 'right',
    ];
    //

}
