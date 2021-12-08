<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        Gate::authorize('read-comment');

        return view('admin.comment.index',[
            'comments' => Comment::all()
        ]);
    }

    public function destroy(Comment $comment)
    {
        Gate::authorize('delete-comment',$comment);


        $comment->delete();

        return redirect()->back();
    }

    public function update(Comment $comment)
    {
        Gate::authorize('update-comment',$comment);


        $comment->update([
            'status' => '1'
        ]);

        return redirect()->back();

    }
}
