<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'author', 'content', 'image', 'user_id'
    ];

    public function user() {
        return $this->belongsToMany('App\User', 'likes')->withPivot('user_id', 'article_id')->withTimeStamps();
    }
}
