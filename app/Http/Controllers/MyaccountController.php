<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\User;
use App\Post;
use App\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class MyaccountController extends Controller
{
    public function index(){
        $user = Auth()->user();
        return view('website.profiles.my_profile',compact(['user']));
     }

     public function view_post($slug){
        $post = Post::where('slug',$slug)->get();
        return view('website.profiles.blog_details',compact(['post']));
     }
 
     public function edit_profile(User $user)
     {
         return view('website.profiles.edit_myprofile', compact('user'));
     }
 
     public function update_profile(Request $request, User $user)
     {
         $this->validate($request,[
             'user_name'=> 'required',
             'user_email'=> 'required|email',
             'user_pass'=> 'nullable|min:8',
             'confirm_pass'=> 'nullable',
             'cover_pic'=> 'image|nullable',
             'description'=> 'nullable'
         ]);
 
         if($request->hasfile('cover_pic'))
         {
             $filenameWithext=$request->file('cover_pic')->getClientOriginalName();
 
             $filename=pathinfo($filenameWithext, PATHINFO_FILENAME);
 
             $extension=$request->file('cover_pic')->getClientOriginalExtension();
 
             $filenametostore=$filename.'_'.time().'.'.$extension;
             
             $path=$request->file('cover_pic')->storeAs('public/user_image', $filenametostore);
 
         }
 
         else{
 
             $filenametostore=$user->image;
 
         }
 
         $user->name = $request->input('user_name');
         $user->email = $request->input('user_email');
 
         if($request->has('user_pass') && $request->user_pass != null){
             if($request->user_pass == $request->confirm_pass){
                 $user->password = bcrypt($request->input('user_pass'));
             }
             else{
                 return redirect()->back()->with('error','Password did not matched!!');
             }
 
         }
        
         $user->image = $filenametostore;
         $user->description = $request->input('description');
         $user->slug = str::slug($request->user_name, '_') ;
         $user->save();
 
         return redirect('/my_profile')->with('success','Profile Updated successfully.');
     }


     //post

     public function create_post(){
        $categories = category::all();
        return view('website.createblog', compact('categories'));
     }

     public function store_post(Request $request){
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
        return redirect('/my_posts')->with('success', 'Post created successfully');
     }

     public function edit_post($slug){
        $post = Post::where('slug',$slug)->get();
        return view('website.profiles.edit_post',compact(['post']));
     }
     public function update_post(Request $request, Post $post){
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
        return redirect()->to('/view_post/'.$post->slug)->with('success', 'Post Updated successfully');
    }

     public function my_posts(){
         $user = Auth::user();
         $posts = Post::where('user_id',$user->id)->orderBy('published_at')->paginate(9);
         return view('website.profiles.my_blogs', compact('posts'));
     }

     public function delete_post(Post $post)
    {
        if($post->image != 'noimage.jpg'){
            
            Storage::delete('public/post_image/'.$post->image);
          }
        $post->delete();
        return redirect('/my_posts')->with('success', 'Post deleted successfully.');
    }
}
