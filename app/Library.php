<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    //protected $fillable = ['title', 'user_id'];

    public function cards()
    {
        return $this->hasMany('App\Card');
    }

}
