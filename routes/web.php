<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [NewsController::class, 'index']);
Route::get('/article/{id}', [NewsController::class, 'article']);
Route::get('/article/category/{id}', [NewsController::class, 'articlesByCategory']);
Route::post('/news-add-comment', [NewsController::class, 'addComment'])->middleware(['auth']);

Route::group(['middleware' => ['admin']], function () {
    Route::get('admin', [AdminController::class, 'index']);

    Route::get('admin/users', [AdminController::class, 'users']);
    Route::post('admin/users-create', [UsersController::class, 'create']);
    Route::post('admin/users-delete', [UsersController::class, 'delete']);
    Route::post('admin/users-update/{id}', [UsersController::class, 'update']);

    Route::get('admin/articles', [AdminController::class, 'articles']);
    Route::post('admin/articles-create', [ArticleController::class, 'store']);
    Route::get('admin/articles-show/{id}', [ArticleController::class, 'show']);
    Route::post('admin/articles-delete', [ArticleController::class, 'destroy']);
    Route::post('admin/articles-update/{id}', [ArticleController::class, 'update']);

    Route::get('admin/comments', [AdminController::class, 'comments']);
    Route::post('admin/comments-delete', [CommentController::class, 'destroy']);
    Route::post('admin/comments-update/{id}', [CommentController::class, 'update']);

    Route::get('admin/categories', [AdminController::class, 'categories']);
    Route::post('admin/categories-create', [CategoryController::class, 'store']);
    Route::post('admin/categories-update/{id}', [CategoryController::class, 'update']);
    Route::post('admin/categories-delete', [CategoryController::class, 'destroy']);

});

require __DIR__ . '/auth.php';
