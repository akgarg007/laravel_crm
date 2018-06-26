<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    // declare fillables fields here according to the table
    protected $fillable = [
        'phone',
        'user_id'
    ];
}
