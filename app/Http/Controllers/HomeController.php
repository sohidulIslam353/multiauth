<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\User;
use Hash;
use Illuminate\support\facades\Auth;
use Illuminate\support\facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function changePassword(){
        return view('auth.passwords.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $password = Auth::user()->password;
        $oldpass = $request->oldpass;

        if (Hash::check($oldpass,$password)) {
            
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();

            return Redirect()->route('login')->with('successmsg','Password Changed Successful!!');
        } else{
            return Redirect()->back()->with('errormsg','Old Password Doesnot match');
        }
    }
}
