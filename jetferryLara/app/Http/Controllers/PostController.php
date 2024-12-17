<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\View
     */
    public function index(){
        $posts = Post::orderBy("created_at","desc")->get();
        return view('test.posts.index',['posts'=>$posts]);
    }

    // show
    public function show(Post $post){
        return view("test.posts.show",compact('post'));
    }
}
