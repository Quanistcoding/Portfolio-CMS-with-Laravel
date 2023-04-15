<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogCategory(){
        $blogCategories = BlogCategory::all();
        return view('admin/blog/category/index',compact('blogCategories'));
    }

    public function blogCategoryAdd(){
        return view('admin/blog/category/add');
    }

    public function blogCategoryAddStore(Request $request){
        $request->validate([
            'name'=>'required'
        ]);

        BlogCategory::insert([
            'name'=>$request->name
        ]);

        $notification = array(
            'message'=>'Portfolio Category Added.',
            'alert-type'=>'success'
        );  
        return redirect()->back()->with($notification);
    }
}
