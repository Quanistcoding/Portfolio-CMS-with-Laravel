<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function portfolio(){
        $portfolios = Portfolio::latest()->get();
        return view('admin/portfolio/index',compact('portfolios'));
    }


    public function portfolioAdd(){
        return view('admin/portfolio/add');
    }

    public function portfolioAddStore(Request $request){
        if($request->file('image_url')){
            $image = $request->file('image_url');
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $save_url = "upload/portfolio/".$name;
            Image::make($image)->resize(1020,519)->save($save_url);
            Portfolio::insert([
                'title'=>$request->title,
                'sub_title'=>$request->sub_title,
                'category'=>$request->category,
                'description'=>$request->description,
                'image_url'=>$save_url
            ]);
        }else{
            Portfolio::insert([
                'title'=>$request->title,
                'sub_title'=>$request->sub_title,
                'category'=>$request->category,
                'description'=>$request->description,
            ]);
        }

        $notification = array(
            'message'=>'Portfolio added.',
            'alert-type'=>'success'
        );  

        return redirect()->route('admin.portfolio')->with($notification);
    }

    public function portfolioEdit($id){
        $portfolio = Portfolio::find($id);
        return view('admin/portfolio/edit',compact('portfolio'));
    }

    public function portfolioEditStore(Request $request){
        if($request->file('image_url')){
            $image = $request->file('image_url');
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $save_url = "upload/portfolio/".$name;
            Image::make($image)->resize(1020,519)->save($save_url);
            Portfolio::findOrFail($request->id)->update([
                'title'=>$request->title,
                'sub_title'=>$request->sub_title,
                'category'=>$request->category,
                'description'=>$request->description,
                'image_url'=>$save_url
            ]);
        }else{
            Portfolio::findOrFail($request->id)->update([
                'title'=>$request->title,
                'sub_title'=>$request->sub_title,
                'category'=>$request->category,
                'description'=>$request->description,
            ]);
        }
        $notification = array(
            'message'=>'Portfolio Updated.',
            'alert-type'=>'success'
        );  

        return redirect()->route('admin.portfolio')->with($notification);
    }

    public function portfolioDelete($id){
        Portfolio::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Portfolio deleted.',
            'alert-type'=>'success'
        );  
    
        return redirect()->route('admin.portfolio')->with($notification);
    }
}
