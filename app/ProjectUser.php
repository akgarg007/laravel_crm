<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    // declare fillables fields here according to the table
    protected $fillable = [
        'project_id',
        'user_id'
    ];
}
