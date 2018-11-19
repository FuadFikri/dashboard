<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function edit()
    {
        $user = User::find(1)->first();
        return view('profile',['user'=>$user]);
    }
    public function update(Request $request)
    {
        $user = User::find(1)->first();
        $request->validate([
            'email' => 'email|required',
            'password' => 'required | min:8',
            '-password' => 'same:password',
        ]);
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->back()->with('alert','Updated');
        // return redirect(url('/data'));
    }

}
