<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use App\Http\Resources\Comment as CommentResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Article $article)
    {
        $comments = $article->comments;
        return response()->json(CommentResource::collection($comments),200);
    }


    public function store(Request $request, Article $article)
    {
        $request->validate([
           'text'=>'required|string'
        ]);

        $comment = $article->comments()->save(new Comment($request->all()));
        return response()->json($comment, 201);
    }

    public function show(Article $article, Comment $comment)
    {
        return response()->json($article->comments()->where('id',$comment->id)->firstOrFail(),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
