<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminUserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function create(Request $request): RedirectResponse
    {
        return (new AdminUserService())->store($request);
    }

    public function delete(Request $request): RedirectResponse
    {
        return (new AdminUserService())->deleteUser($request);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        return (new AdminUserService())->updateUser($request, $id);
    }
}
