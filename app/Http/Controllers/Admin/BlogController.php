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
            'message'=>'Blog Category Added.',
            'alert-type'=>'success'
        );  
        return redirect()->route("admin.blog.category")->with($notification);
    }

    public function blogCategoryEdit($id){
        $blogCategory = blogCategory::find($id);
        return view('admin/blog/category/edit',compact('blogCategory'));
    }

    public function blogCategoryEditStore(Request $request){
        $request->validate([
            'name'=>'required'
        ]);

        blogCategory::findOrFail($request->id)->update([
            'name'=>$request->name
        ]);

        $notification = array(
            'message'=>'Blog Category Updated.',
            'alert-type'=>'success'
        );  
        return redirect()->route('admin.blog.category')->with($notification);
    }

    public function blogCategoryDelete($id){
        $blogCategory = BlogCategory::find($id);

        $blogCategory->delete();

        $notification = array(
            'message'=>'Blog category deleted.',
            'alert-type'=>'success'
        );  
    
        return redirect()->route('admin.blog.category')->with($notification);
    }
}
