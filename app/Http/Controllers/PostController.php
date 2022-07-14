<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user =$request->user();
        $post=User::with('posts')->get();
        if($user->role === User::ROLE_ADMIN){
        return view('adminhome')->with('admindisplay',$post);
        }
        return view('userhome')->with('userdisplay',$post);

    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogform');
    }
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {    try{
        $addpost=Post::create([
            'user_id'=>$request->id,
            'title'=>$request->title,
            'content'=>$request->content,
            ]);
            return redirect()->back()->with('addpostsuccess','Post has been added successfully');
        }
        catch(\Exception $e){
                return redirect()->back()->with('addposterror','Failed to add post');
            }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        $post=Post::find($id);
        if($post){
        $post->delete();
        return redirect()->back(); 
      }
        return redirect()->back()->with("deleteerror","Failed to delete post");  
}
}
