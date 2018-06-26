<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // declare fillables fields here according to the table
    protected $fillable = [
        'body',
        'url',
        'user_id',
        'commentable_id',
        'commentable_type'
    ]; 

    public function commentable()
    {
        return $this->morphTo();
    }
    
}
