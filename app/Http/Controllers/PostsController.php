<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts=Post::all();
        $posts= Post::orderBy('Software_Name','asc')->paginate(10);
        return view ('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Software_Name'=> 'required',
            'Software_Information'=> 'required',
            'blacklisted' => 'required'
        ]);

        $post = new Post;
        $post->Software_Name = $request->input('Software_Name');
        $post->Software_Information = $request->input('Software_Information');
        $post['category'] = $request->input('blacklisted');
    
        $post->save();
        //return 123;
        return redirect('/Admin/Software')->with('success', 'Software Added');
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
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post);


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
        $this->validate($request,[
            'Software_Name'=> 'required',
            'Software_Information'=> 'required'
        ]);

        $post = Post::find($id);
        $post->Software_Name = $request->input('Software_Name');
        $post->Software_Information = $request->input('Software_Information');
        $software['category'] = $request->input('blacklisted');
        $post->save();
        //return 123;
        return redirect('/Admin/Software')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post-> delete();
        return redirect('/Admin/Software')->with('success', 'Post Deleted');
    }
}
