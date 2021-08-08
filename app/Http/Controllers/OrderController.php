<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create() {
        return $this->returnView('pages.checkout');
    }

    public function store(OrderRequest $request) {
        $request->flash();
        $request->validated();

        $user_session = session()->getId();
        $user_id = Auth::id();
        $products_cart = collect();

        // добавление товаров в корзину
        $user_products = explode(',', $request->cart);
        foreach ($user_products as $item) {
            $product = explode('-', $item);
            $product_model = Product::find($product[0]);
            $checkCart = $this->checkCart($product[0]);

            if ($checkCart) {
                $checkCart->quantity = $product[1];
                $checkCart->price = $product_model->price;
                $checkCart->total = $product[1] * $product_model->price;
                $checkCart->user_id = $user_id;
                $checkCart->update();
                $this->order_total = $this->order_total + $checkCart->total;
            } else {
                $cart = new Cart();
                $cart->session_id = $user_session;
                $cart->user_id = $user_id;
                $cart->product_id = $product[0];
                $cart->quantity = $product[1];
                $cart->price = $product_model->price;
                $cart->total = $product[1] * $product_model->price;
                $cart->save();
                $this->order_total = $this->order_total + $cart->total;
            }
            $product_model->quantity = $product[1];
            $products_cart->push($product_model);
        }

        // оформление заказа
        if ($this->checkOrder()) {
//            TODO проверка есть ли такой заказ уже. Возвращаю 404,
// Нужна страница ошибок и туда редерект
//            return abort(404);
            dd('order');
        } else {
            $order = new Order();
            $order->fill($request->all());
            $order->session_id = $user_session;
            $order->user_id = $user_id;
            $order->total_price = $this->order_total;
            $order->save();
            $mail = new MailService();
            session()->regenerate();
            $mail->sendMail($order);
        }

//        dd($products_cart);

        return $this->returnView('pages.order_ready', [
            'order' => $order,
            'products_cart' => $products_cart,
        ]);
    }

    private function checkCart(int $product_id) {
        $value = Cart::query()->where('session_id', '=', session()->getId())
            ->where('product_id', '=', $product_id)->first();
        if ($value) {
            return $value;
        } else return false;
    }
    private $order_total = 0;

    private function checkOrder() {
        $value = Order::query()->where('session_id', '=', session()->getId())->first();
        if ($value) {
            return true;
        } else return false;
    }
}
