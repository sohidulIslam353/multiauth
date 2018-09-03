<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Hash;
use Illuminate\support\facades\Auth;
use Illuminate\support\facades\Redirect;

class SettingsController extends Controller
{
    public function index()
    {
    	return view('admin.passwords.changePass');
    }
    public function Update_pass(Request $request)
    {
        $password = Auth::admin()->password;
        $oldpass = $request->oldpass;

        if (Hash::check($oldpass,$password)) {
            
            $admin=Admin::find(Auth::id());
            $admin->password=Hash::make($request->password);
            $admin->save();
            Auth::logout();

            return Redirect()->route('admin.passwords.changePass')->with('successmsg','Password Changed Successful!!');
        } else{
            return Redirect()->back()->with('errormsg','Old Password Doesnot match');
        }
    }
}
