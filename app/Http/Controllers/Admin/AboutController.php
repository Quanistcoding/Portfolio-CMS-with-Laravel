<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\ImageGroup;
use Illuminate\Support\Facades\Redis;
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
            
            Image::make($image)->resize(636,852)->save($saveUrl);
            
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

    public function imageGroup(){
        $images = ImageGroup::all();

        return view('admin/about/imageGroup/index',compact('images'));
    }
    
    public function imageGroupAdd(){
        return view('admin/about/imageGroup/add');
    }

    public function imageGroupAddStore(Request $request){
        $images = $request->file('image_url');
        if($images == null){
            $notification = array(
                'message'=>'No image added.',
                'alert-type'=>'info'
            );  

             return redirect()->route('admin.about.imageGroup')->with($notification);
        }
        foreach($images as $image){
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $save_url = 'upload/about/imageGroup/'.$name;
            Image::make($image)->resize(150,150)->save($save_url);
            ImageGroup::insert([
                'image_url'=> $save_url
            ]);
        };

        $notification = array(
            'message'=>'Images added.',
            'alert-type'=>'success'
        );  

        return redirect()->route('admin.about.imageGroup')->with($notification);
    }

    public function imageGroupEdit($id){
        $image = ImageGroup::find($id);
        return view('admin/about/imageGroup/edit',compact('image'));
    }

    public function imageGroupEditStore(Request $request){
        if($request->file('image_url')){
            $image = $request->file('image_url');
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $save_url = 'upload/about/imageGroup/'.$name;
            Image::make($image)->resize(150,150)->save($save_url);
            ImageGroup::findOrFail($request->id)->update([
                'image_url'=> $save_url
            ]);
        };

    $notification = array(
        'message'=>'Images updated.',
        'alert-type'=>'success'
    );  

    return redirect()->route('admin.about.imageGroup')->with($notification);
    }

    public function imageGroupDelete($id){
        ImageGroup::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Images deleted.',
            'alert-type'=>'success'
        );  
    
        return redirect()->route('admin.about.imageGroup')->with($notification);
    }
}
