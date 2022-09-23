<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminCommentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function update(Request $request, int $id): RedirectResponse
    {
        return (new AdminCommentService())->updateComment($request, $id);
    }

    public function destroy(Request $id): RedirectResponse
    {
        return (new AdminCommentService())->deleteComment($id);
    }
}
