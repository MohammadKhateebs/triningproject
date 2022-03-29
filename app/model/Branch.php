<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'id','name','classroom','delete'
    ];
    public function student()
    {
        return $this->hasMany(Student::class,'branch_id');
    }
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
}
