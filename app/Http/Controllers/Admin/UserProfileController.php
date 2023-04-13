<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Intervention\Image\Facades\Image;

class UserProfileController extends Controller
{
    public function edit(){

        $profile = Profile::find(1);

        return view('admin.profile.edit',compact('profile'));
    }

    public function editStore(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        if($request->file('image_url')){
            $image = $request->file('image_url');
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $saveUrl = 'upload/profile/'.$name;
            
            Image::make($image)->resize(200,200)->save($saveUrl);
            
            Profile::findOrFail(1)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'image_url' => $saveUrl
            ]);
        }else{
            Profile::findOrFail(1)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name
            ]);
        }
        
        $notification = array(
            'message'=>'Profile Updated.',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }

}
