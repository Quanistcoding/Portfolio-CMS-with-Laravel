<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function portfolio(){
        $portfolios = Portfolio::latest()->get();
        return view('admin/portfolio/index',compact('portfolios'));
    }


    public function portfolioAdd(){
        $portfolioCategories = PortfolioCategory::all();
        return view('admin/portfolio/add',compact('portfolioCategories'));
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

        PortfolioCategory::find($request->category)->increment('portfolio_count');

        $notification = array(
            'message'=>'Portfolio added.',
            'alert-type'=>'success'
        );  

        return redirect()->route('admin.portfolio')->with($notification);
    }

    public function portfolioEdit($id){
        $portfolio = Portfolio::find($id);
        $portfolioCategories = PortfolioCategory::all();
        return view('admin/portfolio/edit',compact('portfolio','portfolioCategories'));
    }

    public function portfolioEditStore(Request $request){

        $oldCategoryId = Portfolio::findOrFail($request->id)->category;
        $oldCategory = PortfolioCategory::find($oldCategoryId);
        if($oldCategory != null)
             $oldCategory->decrement('portfolio_count');

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

        PortfolioCategory::find($request->category)->increment('portfolio_count');

        $notification = array(
            'message'=>'Portfolio Updated.',
            'alert-type'=>'success'
        );  

        return redirect()->route('admin.portfolio')->with($notification);
    }

    public function portfolioDelete($id){
        $portfolio = Portfolio::findOrFail($id);
        unlink($portfolio->image_url);

        PortfolioCategory::find($portfolio->category)->decrement('portfolio_count');

        $portfolio->delete();
        $notification = array(
            'message'=>'Portfolio deleted.',
            'alert-type'=>'success'
        );  
    
        return redirect()->route('admin.portfolio')->with($notification);
    }

    public function portfolioCategory(){
        $portfolioCategories = PortfolioCategory::all();
        return view('admin/portfolio/category/index',compact('portfolioCategories'));
    }

    public function portfolioCategoryAdd(){
        return view('admin/portfolio/category/add');
    }

    public function portfolioCategoryAddStore(Request $request){
        $request->validate([
            'name'=>'required'
        ]);

        PortfolioCategory::insert([
            'name'=>$request->name
        ]);

        $notification = array(
            'message'=>'Portfolio Category Added.',
            'alert-type'=>'success'
        );  
        return redirect()->route('admin.portfolio.category')->with($notification);
    }

    public function portfolioCategoryEdit($id){
        $portfolioCategory = PortfolioCategory::find($id);
        return view('admin/portfolio/category/edit',compact('portfolioCategory'));
    }

    public function portfolioCategoryEditStore(Request $request){
        $request->validate([
            'name'=>'required'
        ]);

        PortfolioCategory::findOrFail($request->id)->update([
            'name'=>$request->name
        ]);

        $notification = array(
            'message'=>'Portfolio Category Updated.',
            'alert-type'=>'success'
        );  
        return redirect()->route('admin.portfolio.category')->with($notification);
    }

    public function portfolioCategoryDelete($id){
        $portfolioCategory = PortfolioCategory::find($id);

        $portfolioCategory->delete();

        $notification = array(
            'message'=>'Portfolio category deleted.',
            'alert-type'=>'success'
        );  
    
        return redirect()->route('admin.portfolio.category')->with($notification);
    }
}
