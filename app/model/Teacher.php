<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name','identification','delete','educationLevel','phone','branch_id','salary'
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }
}
