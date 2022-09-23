<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class AdminArticleService
{
    public function addNewArticle(Request $request): RedirectResponse
    {
        $article = new Article([
            'user_id' => Auth::user()->getAuthIdentifier(),
            'category_id' => $request->category,
            'title' => $request->title,
            'content' => $request->articleContent,
            'image' => $request->file('image')->store('images', 'public'),
            'created_at' => now(),
        ]);

        $article->save();

        return Redirect::back();
    }

    public function deleteArticle(Request $request): RedirectResponse
    {
        Article::where('id', $request->id)->delete();

        return Redirect::back();
    }

    public function showArticle(Request $request): Factory|View|Application
    {
        return view('admin.one-article', [
            'article' => Article::where('id', $request->id)->first(),
        ]);

    }

    public function updateArticle(Request $request, int $id): RedirectResponse
    {
        $article = Article::where('id', $id)->first();
        $article->title = $request->title;
        $article->content = $request->articleContent;
        if ($request->file('image') == null) {
            $article->image = '';
        } else {
            $article->image = $request->file('image')->store('images', 'public');
        }
        $article->updated_at = now();
        $article->save();

        return Redirect::back();

    }
}
