<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminArticleService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        return (new AdminArticleService())->addNewArticle($request);
    }

    public function show(Request $request): Factory|View|Application
    {
        return (new AdminArticleService())->showArticle($request);
    }

    public function update(Request $request, int $id)
    {
        return (new AdminArticleService())->updateArticle($request, $id);
    }

    public function destroy(Request $request): RedirectResponse
    {
        return (new AdminArticleService())->deleteArticle($request);
    }
}
