<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{

    protected $fillable = [
        'comment_id',
        'author',
        'email',
        'body',
        'is_active'
    ];

    # This reply belongs to a comment
    public function comment() {
        return $this->belongsTo('App\Comment');
    }

}