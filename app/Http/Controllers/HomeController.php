<?php

namespace App\Http\Controllers;

use App\Post as AppPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Post;
use App\User;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->post = new Post;
        $this->user = new User;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $posts = $this->post::join('users', 'users.id', '=', 'posts.user_id')
                ->orderBy('posts.id')
                ->get();
        return view('home', ['posts'=>$posts]);
    }

    public function addPost(Request $request){
        $this->post->title = $request->title;
        $this->post->post_body = $request->post_body;
        $this->post->user_id = auth()->id();
        $this->post->save();

        return redirect()->action('HomeController@index');
    }
    
    public function userPosts($id){
        $userPosts = $this->post::join('users', 'users.id', '=', 'posts.user_id')
                    ->where('user_id', "=", $id)
                    ->orderBy('posts.id')
                    ->get();
        return view('user-posts', ['userPosts' => $userPosts]);
    }
}
