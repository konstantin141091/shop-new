<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product) {
        return $this->returnView('pages.product', [
            'product' => $product,
        ]);
    }

    public function search(Request $request) {
        $search_value = '%' . $request->product_search . '%';
        $products = Product::query()->where('name', 'like', $search_value)->get();
        if ($products->isEmpty()) {
            return back()->with('error', 'Ничего не нашли');
        } else {
            if ($products->count() > 1) {
                $categories = Category::all();
                return $this->returnView('pages.search_product', [
                    'products_search' => $products,
                    'categories' => $categories,
                ]);
            } else {
                return $this->returnView('pages.product', [
                    'product' => $products->first(),
                ]);
            }
        }
    }
}
