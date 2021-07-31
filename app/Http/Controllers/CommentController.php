<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('id', 'DESC')->paginate(20);
        return view('back.pages.comment', compact('comments'));
    }

    public function edit(Comment $comment)
    {
        // dd($comment);
        return view('back.pages.edit_comment', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());

        $msg = "ذخیره ی نظر با موفقیت انجام شد";
        return redirect(route('admin.comments'))->with('success', $msg);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect(route('admin.comments'));

        $msg = "آیتم مورد نظر حذف گردید";
        return redirect(route('admin.comments'))->with('success', $msg);
    }
    
    public function updatec_status_comment(Comment $comment)
    {
        if ($comment->status == 1) {
            $comment->status = 0;
        } else {
            $comment->status = 1;
        }

        $comment->save();
        $msg = "بروزرسانی با موفقیت انجام شد";
        return redirect(route('admin.comments'))->with('success', $msg);
    }
}
