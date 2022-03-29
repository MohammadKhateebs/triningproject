<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $table="installments";
    protected $fillable = [
        'id','month','term','student_id','receipt','updated_at','installments'
    ];

    //
}
