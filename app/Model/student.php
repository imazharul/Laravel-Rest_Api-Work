<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = [
        'student_id','name', 'email','password','image','gender'
    ];
}
