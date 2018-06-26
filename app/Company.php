<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // declare fillables fields here according to the table
    protected $fillable = [
        'id',
        'name',
        'description',
        'user_id'
    ]; 

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    // here we are fetching all the projects of a company
    public function projects(){
        return $this->hasMany('App\Project');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

}
