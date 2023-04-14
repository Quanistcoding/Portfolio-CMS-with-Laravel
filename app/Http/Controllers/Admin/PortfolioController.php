<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PortfolioController extends Controller
{
    public function portfolio(){
        $portfolios = Portfolio::all();
        return view('admin/portfolio/index',compact('portfolios'));
    }


    public function portfolioAdd(){
        return view('admin/portfolio/add');
    }

    public function portfolioAddStore(Request $request){
        Portfolio::insert([
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'category'=>$request->category,
            'description'=>$request->description,
        ]);

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
        Portfolio::findOrFail($request->id)->update([
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'category'=>$request->category,
            'description'=>$request->description,
        ]);

        $notification = array(
            'message'=>'Portfolio Updated.',
            'alert-type'=>'success'
        );  

        return redirect()->route('admin.portfolio')->with($notification);
    }
}
