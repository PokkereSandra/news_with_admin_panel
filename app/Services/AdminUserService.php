<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminUserService
{
    public function store(Request $request): RedirectResponse
    {
        $user = new User([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();

        return Redirect::back();

    }

    public function deleteUser(Request $request): RedirectResponse
    {
        User::where('id', $request->id)->delete();

        return Redirect::back();

    }

    public function updateUser(Request $request, int $id): RedirectResponse
    {
        $user = User::where('id', $id)->first();
        $user->nickname = $request->userNickname;
        $user->email = $request->userEmail;
        $user->is_admin = $request->isAdmin;
        $user->save();

        return Redirect::back();

    }

}
