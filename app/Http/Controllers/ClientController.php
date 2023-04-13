<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class ClientController extends Controller
{
    public function detail(){
        $about=About::find(1);

        return view('client.about.index',compact('about'));
    }
}
