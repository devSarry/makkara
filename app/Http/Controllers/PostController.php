<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['vote', 'create', 'store']]);
    }
    public function index()
    {
        $posts = Post::paginate(15);

        /*set the path for the render function of the pagination links*/

        $posts->setPath('posts');

        return view('posts.show', ['posts' => $posts]) ;
    }

    public function create()
    {
        return view('posts.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $post = new Post($request->input());


        Auth::user()->posts()->save($post);

         /*$user = Auth::user()->id;

            $post = new Post;

            $post->title = $request->title;
            $post->content = $request->post_content;


            $post->user_id = $user;
            $post->save();*/

        return redirect('posts');

    }

    public function show(Post $post)
    {
        //dd($post->user()->first()->hasVotedOnPost($post));
        return view('posts.singlePost', ['post' => $post]);
    }

    public function vote(Post $post, Request $request)
    {
        Auth::user()->vote($request->input('value'), $post);

        return redirect()->back();
    }
}
