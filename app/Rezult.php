<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rezult extends Model
{
    //
    protected $fillable = [
        'user_id', 'date', 'nom_quest','problem_id','rezult'
    ];
}
