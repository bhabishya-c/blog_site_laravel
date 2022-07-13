<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminindex()
    {
        $post=User::with('posts')->get();
        return view('adminhome')->with('admindisplay',$post);
    }
    public function userindex()
    {
        $post=User::with('posts')->orderBy('id','desc')->get();
        return view('userhome')->with('userdisplay',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addblog');
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
        catch (\Exception $e){
                return redirect()->back()->with('addposterror','Failed to add post');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id=request()->id;
        $content=Post::where('id',$id)->get();
        return view('adminpostcontent')->with('display',$content);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admindestroy()
    {
        $id=request()->id;
        Post::where("id",$id)->delete();
        return redirect('/adminhome');
    }
    public function userdestroy()
    {
        $id=request()->id;
        Post::where("id",$id)->delete();
        return redirect('/userhome');
    }
}
