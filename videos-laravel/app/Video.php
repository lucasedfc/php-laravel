<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    
    //Relation one to many
    // one video multiple comments
    public function comments() {
        return $this->hasMany('App\Comment');
    }

    //Relation one to one
    // comment from one user
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }


}
