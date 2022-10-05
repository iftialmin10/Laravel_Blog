<?php

namespace App\Http\Controllers;

use App\category;
use App\Tag;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'post_name'=>'required',
            'post_category'=>'required',
            'cover_pic'=>'image|nullable|max:1999',
            'description'=>'required'
        ]);

        //image handel

       if($request->hasfile('cover_pic'))
        {
            $filenameWithext=$request->file('cover_pic')->getClientOriginalName();

            $filename=pathinfo($filenameWithext, PATHINFO_FILENAME);

            $extension=$request->file('cover_pic')->getClientOriginalExtension();

            $filenametostore=$filename.'_'.time().'.'.$extension;
            
            $path=$request->file('cover_pic')->storeAs('public/post_image', $filenametostore);

        }
        else{

            $filenametostore='noimage';
        }
       

        $post=new Post();
        $post->title=$request->input('post_name');
        $post->slug=Str::slug($request->post_name,'-');
        $post->image=$filenametostore;
        $post->category_id=$request->input('post_category');
        $post->user_id=auth()->user()->id;
        $post->description=$request->input('description');
        $post->published_at=Carbon::now();
        $post->save();
        $post->tags()->attach($request->tag);
        return redirect('/admin/post')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = category::all();
        return view('admin.post.update', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'post_name'=>'required',
            'post_category'=>'required',
            'description'=>'required'
        ]);

        //image handel

        if($request->hasfile('cover_pic'))
        {
            $filenameWithext=$request->file('cover_pic')->getClientOriginalName();

            $filename=pathinfo($filenameWithext, PATHINFO_FILENAME);

            $extension=$request->file('cover_pic')->getClientOriginalExtension();

            $filenametostore=$filename.'_'.time().'.'.$extension;
            
            $path=$request->file('cover_pic')->storeAs('public/post_image', $filenametostore);

        }
        else{

            $filenametostore = $post->image;
        }

        $post->title=$request->input('post_name');
        $post->slug=Str::slug($request->post_name,'-');
        $post->image=$filenametostore;
        $post->category_id=$request->input('post_category');
        $post->user_id=auth()->user()->id;
        $post->description=$request->input('description');
        $post->published_at=Carbon::now();
        $post->tags()->sync($request->tag);
        $post->save();
        return redirect('/admin/post')->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image != 'noimage.jpg'){
            
            Storage::delete('public/post_image/'.$post->image);
          }
        $post->delete();
        return redirect('/admin/post')->with('success', 'Post deleted successfully.');
    }
}
