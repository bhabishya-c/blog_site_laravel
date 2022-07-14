<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        try{
        $id=$request->id;
        $comment=$request->comment;
        $createcomment=Comment::create([
            'post_id'=>$id,
            'comment'=>$comment,
        ]);
        return redirect()->back();
    }
    catch (\Exception $e){
        return redirect()->back()->with('commenterror','Failed to add comment');
       }
}
}
