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

    public function commentApprove($id,$status){
        Comment::findOrFail($id)->update([
            'approved' => $status == 0 ? 1 : 0
        ]);
        return redirect()->back();
    }

    public function edit($id){
        $comment = Comment::findOrFail($id);
        return view('admin/comment/edit',compact('comment'));
    }

    public function editStore(Request $request){
        Comment::findOrFail($request->id)->update([
            'author_name' => $request->author_name,
            'author_email' => $request->author_email,
            'author_phone' => $request->author_phone,
            'author_website' => $request->author_website,
            'content' => $request->content
        ]);

        $notification = array(
            'message'=>'Comment updated',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.comment')->with($notification);
    }

    public function commentDelete($id){
        Comment::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Comment deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.comment')->with($notification);
    }
}
