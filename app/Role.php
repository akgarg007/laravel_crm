<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // declare fillables fields here according to the table
    protected $fillable = [
        'name'
    ];


    // A role has many users
    public function users()
    {
        return $this->hasMany('App\Users');
    }

}
