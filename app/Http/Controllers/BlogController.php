<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::with('user')->paginate(10);
        return view('user.blog', ['posts' => $posts]);
    }

    public function show($slug){
        $post = Post::where('slug',$slug)->first();
        if($post){
            return view('user.showblog',['post' => $post]);
        } else{
            return abort(404);
        }
    }
}

