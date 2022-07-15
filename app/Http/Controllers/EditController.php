<?php

namespace App\Http\Controllers;
use App\Http\Requests\EditRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class EditController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id=$request->id;
        $edit=Post::find($id);
        if($edit){
        return view('editform',)->with('edit',$edit);
        }
        return abort(403);

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
            $id=$request->id;
            $title=$request->title;
            $content=$request->content;
            $post=Post::find($id);
            if($post){
                $post->update(['title'=>$title,'content'=>$content]);
                return redirect('/home')->with('editsuccess','Post has been edited successfully');
            }
                return redirect('/home')->with('editerror','Failed to edit post');
    }
   
}
