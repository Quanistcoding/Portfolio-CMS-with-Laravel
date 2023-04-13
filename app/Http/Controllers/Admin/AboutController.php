<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function about(){
        $about = About::find(1);
        return view('admin.about.index',compact('about'));
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'sub_title'=>'required',
        ]);

        if($request->file('image_url')){
            $image = $request->file('image_url');
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $saveUrl = 'upload/about/'.$name;
            
            Image::make($image)->resize(200,200)->save($saveUrl);
            
            About::findOrFail(1)->update([
                'title'=>$request->title,
                'sub_title'=>$request->sub_title,
                'video_url'=>$request->video_url,
                'short_description'=>$request->short_description,
                'long_description'=>$request->long_description,
                'image_url'=>$saveUrl,
            ]);
        }else{
            About::findOrFail(1)->update([
                'title'=>$request->title,
                'sub_title'=>$request->sub_title,
                'video_url'=>$request->video_url,
                'short_description'=>$request->short_description,
                'long_description'=>$request->long_description,
            ]);
        }

        $notification = array(
            'message'=>'Profile Updated.',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }
}
