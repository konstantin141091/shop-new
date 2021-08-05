<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $new_products = Product::query()->where('news', true)->get();
        $products = Product::all(['id','name']);
        return $this->returnView('pages.index', [
            'new_products' => $new_products,
            'search_products' => $products,
        ]);
    }

    public function about() {
        return $this->returnView('pages.about');
    }

    public function contacts() {
        return $this->returnView('pages.contacts');
    }

    public function delivery() {
        return $this->returnView('pages.delivery');
    }

    public function returnPolicy() {
        return $this->returnView('pages.return_policy');
    }

    public function useAgreement() {
        return $this->returnView('pages.use_agreement');
    }

    public function cart() {
        return $this->returnView('pages.cart');
    }
}
