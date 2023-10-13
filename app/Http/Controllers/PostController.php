<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function dashboard(){
        $posts = Post::all();
        return view('auth.admin.dashboard', ['posts' => $posts]);
    }
    
    public function post(){
        $posts = Post::paginate(4);
        return view('auth.admin.post', ['posts' => $posts]);
    }

    public function create(){
        return view('auth.admin.addpost');
    }

    public function store(Request $request){

        // validate data
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
        ]);

        $post = new Post;
        $post->user_id = auth()->user()->id; 
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        

        $post->save();

        return back()->withSuccess('Post Created !!');
    }

    public function edit($id){
        $posts = Post::where('id', $id)->first();
        return view('auth.admin.edit', ['posts' => $posts]);
    }

    public function update(Request $request, $id){

        // validate data
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
        ]);

        $posts = Post::where('id',$id)->first();

        $posts->title = $request->title;
        $posts->slug = $request->slug;
        $posts->content = $request->content;

        $posts->save();

        return back()->withSuccess('Post Updated !!');
    }

    public function delete($id){
        $post = Post::where('id',$id)->first();
        $post->delete();
        return back()->withSuccess('Post Deleted !!');
    }

    public function show($id){
        $post = Post::where('id',$id)->first();
        return view('auth.admin.show',['post' => $post]);
    }
}
