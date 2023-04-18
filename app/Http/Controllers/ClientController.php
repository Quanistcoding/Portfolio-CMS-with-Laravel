<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\PortfolioCategory;
use App\Models\Profile;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function aboutDetail(){
        $about=About::find(1);
        return view('client.about.index',compact('about'));
    }

    public function portfolio(Request $request){
        $countsPerPage = 10;
        $portfolioCount = Portfolio::count();
        $paginationTabCount = ceil($portfolioCount / $countsPerPage);

        if($request->page == null){
            $portfolios = Portfolio::latest()->get();
        }else{
            $portfolios = Portfolio::latest()->skip($countsPerPage*($request->page-1))->take(10)->get();
        };

        $categories = PortfolioCategory::all()->filter(function($category){
            return $category->portfolio_count > 0;
        });
        
        return view('client.portfolio.list',compact('portfolios','categories','paginationTabCount'));
    }

    public function portfolioDetail($id){
        $portfolio = Portfolio::findOrFail($id);

        return view('client.portfolio.index',compact('portfolio'));
    }

    public function blog(){
        $blogs = Blog::all();

        $author = Profile::find(1);

        return view('client.blog.list',compact('blogs','author'));

    }

    public function blogDetail($id){        
        $blog = Blog::findOrFail($id);
        $previousPost = Blog::where('created_at', '<', $blog->created_at)->first();
        $nextPost = Blog::where('created_at', '>', $blog->created_at)->first();

        return view('client.blog.index',compact('blog','previousPost','nextPost'));
    }

    public function storePost(Request $request){
        Comment::insert([
            'author_name'=>$request->author_name,
            'author_email'=>$request->author_email,
            'author_phone'=>$request->author_phone,
            'author_website'=>$request->author_website,
            'content'=>$request->content,
            'post_id'=>$request->post_id,
            'parent_comment_id'=>$request->parent_comment_id,
            'created_at'=>Carbon::now()
        ]);

        return redirect()->back();
    }
}
