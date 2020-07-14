<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $fillable = [
        'sub_id','name', 'code'
    ];
}
