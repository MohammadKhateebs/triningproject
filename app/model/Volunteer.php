<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected  $table='volunteers';
    protected $fillable = [
        'firstName','secondName', 'thirdName','lastName', 'gender','identification',
        'phone', 'address','university','universityId', 'specialization','confirmed',
        'academicYear','studyLevel','active','permissionEvaluation','updated_at','transportation','archives'
    ];

    protected $hidden = [

    ];
}
