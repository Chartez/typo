<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'title', 'user_id', 'headline', 'main_text'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function library()
    {
        return $this->belongsTo('App\Library');
    }

    public function path()
    {
        return '/explore/' . $this->id;
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
