<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function blog(){
        $blogs = Blog::latest()->get();
        return view('admin/blog/index',compact('blogs'));
    }

    public function blogAdd(){
        $blogCategories = BlogCategory::all();
        return view('admin/blog/add',compact('blogCategories'));
    }

    public function blogAddStore(Request $request){
        $request->validate([
            'title'=>'required'
        ]);

        if($request->file('image_url')){
            $image = $request->file('image_url');
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $save_url = "upload/blog/".$name;
            Image::make($image)->resize(850,430)->save($save_url);
            Blog::insert([
                'title'=>$request->title,
                'tags'=>$request->tags,
                'category_id'=>$request->category_id,
                'description'=>$request->description,                
                'created_at'=>Carbon::now(),
                'image_url'=>$save_url
            ]);
        }else{
            Blog::insert([
                'title'=>$request->title,
                'tags'=>$request->tags,
                'category_id'=>$request->category_id,
                'description'=>$request->description,
                'created_at'=>Carbon::now()
            ]);
        }

        $notification = array(
            'message'=>'Blog Post added.',
            'alert-type'=>'success'
        );  

        return redirect()->route('admin.blog')->with($notification);
    }

    public function blogEdit($id){
        $blog = Blog::find($id);
        $blogCategories = BlogCategory::all();
        return view('admin/blog/edit',compact('blog','blogCategories'));
    }

    public function blogEditStore(Request $request){
        $request->validate([
            'title'=>'required'
        ]);

        if($request->file('image_url')){
            $image = $request->file('image_url');
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $save_url = "upload/blog/".$name;
            Image::make($image)->resize(850,430)->save($save_url);
            Blog::findOrFail($request->id)->update([
                'title'=>$request->title,
                'tags'=>$request->tags,
                'category_id'=>$request->category_id,
                'description'=>$request->description,
                'image_url'=>$save_url
            ]);
        }else{
            Blog::findOrFail($request->id)->update([
                'title'=>$request->title,
                'tags'=>$request->tags,
                'category_id'=>$request->category_id,
                'description'=>$request->description
            ]);
        }

        $notification = array(
            'message'=>'Blog post Updated.',
            'alert-type'=>'success'
        );  

        return redirect()->route('admin.blog')->with($notification);
    }

    public function blogDelete($id){
        $blog = Blog::findOrFail($id);
        if($blog->image_url)
          unlink($blog->image_url);

        $blog->delete();

        $notification = array(
            'message'=>'Blog deleted.',
            'alert-type'=>'success'
        );  
    
        return redirect()->route('admin.blog')->with($notification);
    }
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
