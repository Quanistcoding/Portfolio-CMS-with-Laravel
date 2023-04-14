<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Psy\debug;

class AuthController extends Controller
{
    public function changePassword(){
        return view('admin/changePassword');
    }

    public function changePasswordStore(Request $request){
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required',
            'confirm_password'=>'required|same:new_password',
        ]);        

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->new_password);
            $user->save();
            $notification = array(
                'message'=>'Password changed.',
                'alert-type'=>'success'
            );
        }else{
            $notification = array(
                'message'=>'Old Password not matching.',
                'alert-type'=>'error'
            );
        };

        
                
        return redirect()->back()->with($notification);
    }
}
