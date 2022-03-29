<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'name','branch_id','identification','date','archives','id','role'
    ];

}
