<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('can:create_posts');
//        $this->middleware('can:edit_posts');
////        $this->middleware('can:comment_posts');
////        $this->middleware('can:like_posts');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PostsRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();
        $id =  auth()->user()->id;
        return redirect("/profile/$id")->with('success', 'You have successfully added a new post!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $returnHTML = view('posts.update-modal-form',['post'=> $post])->render();
        return response()->json( ['html' => $returnHTML]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PostsRequest $request,$id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();
        $id =  auth()->user()->id;
        return redirect("/posts/$id")->with('success', 'You have successfully updated your post!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $id = auth()->user()->id;
        return redirect("/profile/$id")->with('success2','Post deleted successfully!');
    }
}
