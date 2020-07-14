<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    protected $fillable = [
        'teacher_id','teacher_name', 'teacher_code'
    ];
}
