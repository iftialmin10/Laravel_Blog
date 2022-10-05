<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Tag;
use PDO;

class FrontendController extends Controller
{

    public function home(){
        $posts= Post::orderBy('created_at', 'ASC')->take(5)->get();
        $firstpost2=$posts->splice(0, 2);
        $middlepost=$posts->splice(0, 1);
        $lastpost2=$posts->splice(0, 2);

        $randompost = Post::inRandomOrder()->limit(4)->get();
        $endpost1=$randompost->splice(0, 1);
        $endpost2=$randompost->splice(0, 1); 
        $endposttop=$randompost->splice(0, 1);
        $endpostright=$randompost->splice(0, 1);
        

        $recentposts= Post::with('category')->orderBy('created_at', 'DESC')->paginate(9);

        return view('home', compact(['posts', 'recentposts', 'firstpost2', 'middlepost', 'lastpost2', 'endpost1', 'endpost2', 'endposttop', 'endpostright']));
    }


    public function about(){
        return view('website.about');
    }


    public function category($id){
        $category = category::where('id',$id)->get();
        $posts = Post::where('category_id', $id)->paginate(7);
        return view('website.category', compact(['category', 'posts']));
    }

    public function contact(){
        return view('website.contact');
    }


    public function allpost($slug){
        $posts=Post::where('slug', $slug)->first();
        $popular_post = Post::inRandomOrder()->limit(3)->get();
        $categories = category::all();
        
        $randompost = Post::inRandomOrder()->limit(4)->get();
        $endpost1=$randompost->splice(0, 1);
        $endpost2=$randompost->splice(0, 1); 
        $endposttop=$randompost->splice(0, 1);
        $endpostright=$randompost->splice(0, 1);
        // $tags = Tag::all();
        if($posts){
            return view('website.post', compact(['posts', 'popular_post', 'categories','endpost1','endpost2','endposttop','endpostright']));
        }
        else{
            return redirect('/');
        }
    }

    public function bloger_details(User $user){
        return view('website.profiles.user_info', compact(['user']));
    }

    public function admin_dashboard_info(){
       $posts=count(Post::all());
       $categories=count(category::all());
       $users=count(User::all());
       return view('admin.dashboard.index', compact(['posts', 'categories', 'users']));
    }
}
