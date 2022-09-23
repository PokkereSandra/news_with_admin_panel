<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminCategoryService
{
    public function saveNewCategory(Request $request): RedirectResponse
    {
        $category = new Category([
            'type' => $request->categoryType
        ]);
        $category->save();
        return Redirect::back();
    }

    public function updateCategory(Request $request, int $id): RedirectResponse
    {
        $category = Category::where('id', $id)->first();
        $category->type = $request->categoryType;
        $category->save();

        return Redirect::back();
    }

    public function deleteCategory(Request $request): RedirectResponse
    {
        Category::where('id', $request->id)->delete();

        return Redirect::back();
    }

}
