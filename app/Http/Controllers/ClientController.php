<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Blog;

class ClientController extends Controller
{
    public function aboutDetail(){
        $about=About::find(1);
        return view('client.about.index',compact('about'));
    }

    public function portfolioDetail($id){
        $portfolio = Portfolio::findOrFail($id);

        return view('client.portfolio.index',compact('portfolio'));
    }

    public function blogDetail($id){
        $blog = Blog::findOrFail($id);

        return view('client.blog.index',compact('blog'));
    }
}
