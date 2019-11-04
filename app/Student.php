<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'user_id', 'login', 'password_str','fio','klass','pol','rezult','date_reg','date_rezult',
    ];

}
