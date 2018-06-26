<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    // declare fillables fields here according to the table
    protected $fillable = [
        'task_id',
        'user_id'
    ];


}
