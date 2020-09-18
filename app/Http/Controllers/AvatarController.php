<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
use Image;

class AvatarController extends Controller
{
    //
    // get profile avatar page

    public function getProfileAvatar()
    {

        return view('profilepicture');
    }

    // upload and change the avatar for authenticated user

    public function profilePictureUpload(Request $request)
    {
        if ($request->hasFile('avatar')) {

            $avatar = $request->file('avatar');
            $filename = time().".".$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(250,250)->save(public_path('/img/avatar/'.$filename));
            $user = Auth::user();
            $user->avatar = $filename;

            //validate avatar 
            $request->validate([
                'avatar'=> 'required|image|dimensions:min_width=250,min_height=250|mimes:jpeg,jpg,png'
            ]);
            $user->save();
        }
        return back()->with('message','profile picture updated successfully');
    }

}
