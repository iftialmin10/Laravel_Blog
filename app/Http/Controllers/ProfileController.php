<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;

class ProfileController extends Controller
{
    public function index(){
       $user = Auth()->user();
       return view('admin.profile.index',compact(['user']));
    }

    public function edit_profile(User $user)
    {
       
        return view('admin.profile.update', compact('user'));
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

        return redirect('admin/profile')->with('success','Profile Updated successfully.');
    }
}
