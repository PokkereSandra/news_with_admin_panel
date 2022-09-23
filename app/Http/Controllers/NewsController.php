<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Services\CommentService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('news', [
            'articles' => Article::all(),
            'categories' => Category::all(),
        ]);
    }

    public function addComment(Request $request): RedirectResponse
    {
        return (new CommentService())->saveComment($request);
    }

    public function article(int $id): Factory|View|Application
    {
        return view('article', [
            'article' => Article::where('id', $id)->first(),
            'categories' => Category::all(),
        ]);
    }

    public function articlesByCategory(int $id): Factory|View|Application
    {
        return view('category-articles', [
            'articles' => Article::where('category_id', $id)->get(),
            'categories' => Category::all(),
        ]);
    }
}
