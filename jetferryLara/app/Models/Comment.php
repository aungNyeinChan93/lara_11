<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }

    public function post(){
        return $this->belongsTo(Post::class,"post_id");
    }

    //$c = App\Models\Comment::find(3)->post->comments->first()->user->comments->first()->post->user->posts->first()->comments->first()->user
}
