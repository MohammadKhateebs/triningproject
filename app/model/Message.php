<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'fromRole','toRole','fromId','toId','text','created_at','seen'
    ];

}
