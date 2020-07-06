<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
        $posts = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->get();
        return view('home', ['posts'=>$posts]);
    }

    public function addPost(Request $request){
        $post = $request->input('post_body');
        $user_id = Auth::id();
        $data = array('post_body'=>$post, 'user_id'=>$user_id);
        DB::table('posts')->insert($data);

        return redirect()->action('HomeController@index');
    }
    
    public function userPosts($id){
        $userPosts = DB::table('posts')
                    ->join('users', 'users.id', '=', 'posts.user_id')
                    ->where('user_id', "=", $id)
                    ->get();
        return view('user-posts', ['userPosts' => $userPosts]);
    }
}
