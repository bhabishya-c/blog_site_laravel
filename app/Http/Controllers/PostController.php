<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\EditRequest;
use Illuminate\Support\Facades\Gate;

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
        try{
        $this->authorize('create',Post::class);
        return view('blogform');
    }
        catch(\Exception $e){
        return abort(404);
    }
}
    
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {    
        try{
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
    
    public function show(Request $request){
        $this->authorize('viewAny',Post::class);
        $id=$request->id;
        $content=Post::with('comment')->find($id);
        if($content){
        return view('blogcontent')->with('display',$content);
        }
        return abort(404);
    }
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
        $this->authorize('update',$edit);
        if($edit){
        return view('editform')->with('edit',$edit);
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request)
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('delete',User::class);
        $id=$request->id;
        $post=Post::find($id);
        if($post){
        $post->delete();
        return redirect()->back(); 
      }
        return abort(404);
    }
}
