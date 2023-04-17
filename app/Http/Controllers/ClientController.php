<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Blog;
use App\Models\PortfolioCategory;
use App\Models\Profile;

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

        return view('client.blog.index',compact('blog'));
    }
}
