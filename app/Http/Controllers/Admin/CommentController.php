<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(){
        $comments = Comment::latest()->get();
        return view('admin/comment/index',compact('comments'));
    }
}
