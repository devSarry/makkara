<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Comment;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($post)
    {
        return Comment::query()->where('post_id', '=', $post->id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($post)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store($post, Request $request)
    {
        /*fix parent id*/
        Comment::create([
            'user_id'   => \Auth::id(),
            'post_id'   => $post->id,
            'parent_id' => 1,
            'content'   => $request->comment,
        ]);

        return Response::json(array('success' => true));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
