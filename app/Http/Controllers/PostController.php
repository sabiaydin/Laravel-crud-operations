<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $posts = Post::all();
       return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedPost=$request->validated([
            'user_id'=>'required',
            'title'=>'required',
            'body'=>'required'
        ]);

        $post = Post::create( $validatedPost);
        return response()->json($post);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post=Post::findOrFail($id);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validatedPost=$request->validated([
        'user_id'=>'required',
        'title'=>'required',
        'body'=>'required'
    ]);
    $post=Post::findOrFail($id);
    $post->update( $validatedPost);
    return response()->json($post);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return response()->json(null,204);

    }
}
