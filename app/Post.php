<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'creator',
        'published',
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class, 'tag_post');
    }
}
