<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'post_body' => 'required'
        ]);
        if($validatedData){
            $post = new Post;
            $post->title = $request->title;
            $post->post_body = $request->post_body;
            $post->user_id = auth()->id();
            $post->save();
        }
        
        return redirect()->action('HomeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if(!$post->canEdit()){
            abort(404);
        }
        return view('edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = Post::findOrFail($request->id);
        if(!$post->canEdit()){
            abort(404);
        }

        $validatedData = $request->validate([
            'title' => "required|unique:posts,title,{$request->id}|max:255",
            'post_body' => 'required'
        ]);

        if($validatedData){
            $post->title = $request->title;
            $post->post_body = $request->post_body;
            $post->save();
        }

        return redirect()->action('HomeController@index');
    }


    public function userPosts($id){
        $userPosts = User::with('posts')->findOrFail($id);
        return view('user-posts', ['userPosts' => $userPosts]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
