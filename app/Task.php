<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     // declare fillables fields here according to the table
    protected $fillable = [
        'name',
        'days',
        'hours',
        'company_id',
        'project_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    // for this relationship, laravel checks for task_user table 
    // in the database according to the alphabetical order
    // as t comes before u.
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }


    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

}
