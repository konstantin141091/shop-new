<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Cart;
use App\Models\Order;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Exception;
use Illuminate\Support\Facades\DB;

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

    public function orders() {
        $orders = Order::all()->where('user_id', Auth::id());
        return $this->returnView('pages.account.orders', [
            'orders' => $orders,
        ]);
    }

    public function orderShow(int $id) {
        $order = Order::find($id);

        $products_cart = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.session_id', $order->session_id)->get();

        return $this->returnView('pages.account.order_show', [
            'order' => $order,
            'products_cart' => $products_cart,
        ]);
    }
}
