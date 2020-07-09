<?php

namespace App\Http\Controllers;

use App\Post as AppPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Post;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $posts = Post::with('user')
                ->orderBy('id')
                ->get();
        return view('home', ['posts'=>$posts]);
    }

    // public function addPost(Request $request){
    //     $validatedData = $request->validate([
    //         'title' => 'required|unique:posts|max:255',
    //         'post_body' => 'required'
    //     ]);
    //     if($validatedData){
    //         $post = new Post;
    //         $post->title = $request->title;
    //         $post->post_body = $request->post_body;
    //         $post->user_id = auth()->id();
    //         $post->save();
    //     }
        
    //     return redirect()->action('HomeController@index');
    // }
    
    // public function userPosts($id){
    //     $userPosts = User::with('posts')->find($id);
    //     return view('user-posts', ['userPosts' => $userPosts]);
    // }

    // public function updatePost(Request $request){
    //     $post = Post::findOrFail($request->id);
    //     if(!$post->canEdit()){
    //         abort(404);
    //     }

    //     $validatedData = $request->validate([
    //         'title' => "required|unique:posts,title,{$request->id}|max:255",
    //         'post_body' => 'required'
    //     ]);

    //     if($validatedData){
    //         $post->title = $request->title;
    //         $post->post_body = $request->post_body;
    //         $post->save();
    //     }

    //     return redirect()->action('HomeController@index');
    // }
    
    // public function edit($id){
    //     $post = Post::findOrFail($id);
    //     if(!$post->canEdit()){
    //         abort(404);
    //     }
    //     return view('edit')->with('post', $post);
    // }
}
