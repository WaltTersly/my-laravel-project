<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        //
        return view('changepassword');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function updatePassword(Request $request)
    {
        // $this->validate($request,[
        //     'oldpassword'=> 'required',
        //     'password'=> 'required|confirmed'

        // ]);
        // $hashedPassword = Auth::user()->password;

        // if (Hash::check($request->oldpassword, $hashedPassword)) {

        //     $user = User::find(Auth::id());
        //     $user->password = Hash::make($request->password);
        //     $user->save();
        //     Auth::logout();
        //     return redirect()->route('login')->with('success', "password is changed successfully");
        // }else {
        //     return redirect()->back()->with('error',"current password is invalid");
        // }

        if (!(Hash::check($request->get('oldpassword'), Auth::user()->password))) {
         // The passwords not matches
         return back()->with("error","Your current password does not matches with the password you provided. Please try again.");
         //return response()->json(['errors' => ['current' => ['Current password does not match']]], 422);
        }
        // //uncomment this if you need to validate that the new password is same as old one

        if (strcmp($request->get('oldpassword'), $request->get('new_password')) == 0) {
            //Current password and new password are same
         return back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            //return response()->json(['errors' => ['current' => ['New Password cannot be same as your current password']]], 422);
         }
            $request->validate([
             'oldpassword' => 'required',
             'new_password' => 'required|string|min:6|confirmed',
             
         ]);
        //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            Auth::logout();
          return redirect()->route('login')->with('success', "password is changed successfully");
        

    }

    

}
