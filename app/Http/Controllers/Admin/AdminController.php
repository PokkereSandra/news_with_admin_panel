<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('admin.dashboard');
    }

    public function users(): Factory|View|Application
    {
        return view('admin.users', [
            'users' => User::all(),
        ]);
    }

    public function articles(): Factory|View|Application
    {
        return view('admin.articles', [
            'articles' => Article::all()->sortByDesc('created_at'),
            'categories' => Category::all(),
        ]);
    }

    public function categories(): Factory|View|Application
    {
        return view('admin.categories', [
            'categories' => Category::all(),
        ]);
    }

    public function comments(): Factory|View|Application
    {
        return view('admin.comments', [
            'comments' => Comment::all()->sortByDesc('created_at'),
        ]);
    }
}
