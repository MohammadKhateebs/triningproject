<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static craete(array $array)
 */
class Student extends Model
{
    protected $table="students";
    protected $fillable = [
        'firstName', 'thirdName','secondName','lastName', 'gender','identification',
        'phone', 'address','confirmed','active','teacher','archives','birthday','branch_id','installments',
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


}
