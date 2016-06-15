<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'user_id', 'card_id', 'comment_text',
    ];

    public function cards()
    {
        return $this->hasOne('App\Card');
    }

}
