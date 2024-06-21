<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $comments=Comment::all();
       return response()->json($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedComment = $request->validated([
            'post_id' => 'required',
            'user_id' => 'required',
            'content' => 'required',
        ]);
        $comment=Comment::create($validatedComment);
        return response()->json($comment);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $comment = Comment::findOrFail($id);
       return response()->json($comment);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validatedComment = $request->validated([
            'post_id' => 'required',
            'user_id' => 'required',
            'content' => 'required',
        ]);
        $comment = Comment::findOrFail($id);
        $comment ->update($validatedComment);
        return response()->json($comment);

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return response()->json(null,204);
    }
}
