<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','first_name','middle_name','last_name', 'email', 'password',
        'city',
        'role_id',
        ' '
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function phone()
    {
        return $this->hasOne('App\Phone');
    }


    //  A user belongs to a role
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function companies()
    {
        return $this->hasMany('App\Company');
    }

    public function tasks()
    {
        return $this->belongsToMany('App\Task');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }    

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

}
