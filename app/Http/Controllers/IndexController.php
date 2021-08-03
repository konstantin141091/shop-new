<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $new_products = Product::query()->where('news', true)->get();
        return view('pages.index', [
            'new_products' => $new_products,
        ]);
    }
}
