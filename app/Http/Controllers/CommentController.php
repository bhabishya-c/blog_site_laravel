<?php

namespace App\Http\Controllers;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

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
            $createcomment=Comment::create([
                'post_id'=>$request->id,
                'comment'=>$request->comment,
            ]);
            return redirect()->back();
        }
            catch (\Exception $e){
            return redirect()->back()->with('commenterror','Failed to add comment');
           }
    }

   
}
