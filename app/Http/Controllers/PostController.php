<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

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
    public function admincreate()
    {
        return view('adminaddpost');
    }
    public function usercreate()
    {
        return view('useraddpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addpost=Post::create([
            'user_id'=>$request->id,
            'title'=>$request->title,
            'content'=>$request->content,
            ]);
            if($addpost){
                return redirect()->back()->with('addpostsuccess','Post has been added successfully');
            }else{
                return redirect()->back()->with('addposterror','Failed to add post');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
