<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table="salaries";
    protected $fillable = [
        'id','month','term','salary','teacher_id'
    ];

    //
}
