<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [

        'id','branch_id','student_id','date','term','month','note','eval_ar','eval_en','eval_math','eval_deen'
    ];

}
