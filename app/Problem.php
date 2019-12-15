<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    //
    protected $fillable = [
        'tema', 'klass', 'question','drawing','view','answer'
    ];
    public function Answer()
    {
      return $this->belongsTo('App\Answer');
    }
/*

    */
}
