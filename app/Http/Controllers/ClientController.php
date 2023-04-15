<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\About;

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
}
