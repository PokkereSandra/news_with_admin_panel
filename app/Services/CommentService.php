<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentService
{
    public function saveComment(Request $request): RedirectResponse
    {
        $comment = new Comment([
            'user_id' => Auth::user()->getAuthIdentifier(),
            'article_id' => $request->article_id,
            'content' => $request->comment_body,
            'created_at' => now()
        ]);
        $comment->save();

        return Redirect::back();
    }
}
