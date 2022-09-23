<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminCategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        return (new AdminCategoryService())->saveNewCategory($request);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        return (new AdminCategoryService())->updateCategory($request, $id);
    }

    public function destroy(Request $request): RedirectResponse
    {
        return (new AdminCategoryService())->deleteCategory($request);
    }
}
