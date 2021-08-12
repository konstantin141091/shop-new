<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Exception;

class AccountController extends Controller
{
    public function index() {
        $user = User::find(Auth::id());
        return $this->returnView('pages.account.index', [
            'user' => $user,
        ]);
    }

    public function update(AccountRequest $request) {
        $request->flash();
        $request->validated();
        $user = Auth::user();

        try {
            if ($request->check_password === 'on') {
                $request->validate([
                    'oldPassword' => ['required', 'string', 'min:8'],
                    'newPassword' => ['required', 'string', 'min:8', 'confirmed'],
                ]);

                if (Hash::check($request->oldPassword , Auth::user()->getAuthPassword())) {
                    $password = Hash::make($request->newPassword);
                    $user->password = $password;
                } else {
                    return back()->with('oldPassword', 'Пароль неверный');
                }
            }
            $user->fill($request->all());
            $user->update();

        } catch (\Exception $exception) {
            return back()->with('error', 'Не удалось обновить профиль');
        }
        return back()->with('success', 'Профиль обновлен');
    }
}
