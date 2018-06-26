<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // declare fillables fields here according to the table
    protected $fillable = [
        'name',
        'description',
        'company_id',
        'user_id',
        'days'
    ]; 

    // define the relationships here
    public function user()
    {
        return $this->belongsToMany('App\User');
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
