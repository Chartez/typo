<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{

    protected $table = 'likes';

    protected $fillable = [
        'card_id', 'user_id',
    ];

    public function cards()
    {
        return $this->hasOne('App\Card');
    }
}
