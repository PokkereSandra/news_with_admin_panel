<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminCommentService
{
    public function deleteComment(Request $request): RedirectResponse
    {
        Comment::where('id', $request->id)->delete();

        return Redirect::back();
    }

    public function updateComment(Request $request, int $id): RedirectResponse
    {
        $comment = Comment::where('id', $id)->first();
        $comment->content = $request->commentBody;
        $comment->save();

        return Redirect::back();
    }
}
