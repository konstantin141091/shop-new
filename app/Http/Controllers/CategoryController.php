<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $products = Product::query()->paginate(9);
        $categories = Category::all();
        $category_name = 'Каталог';

        return $this->returnView('pages.catalog', [
            'products_list' => $products->items(),
            'products' => $products,
            'categories' => $categories,
            'category_name' => $category_name,
        ]);
    }
    public function show(Category $category) {
        $category_name = $category->name;
        $categories = Category::all();
        $products = Product::query()->where('category_id', $category->id)->paginate(9);
        return $this->returnView('pages.catalog', [
            'products_list' => $products->items(),
            'products' => $products,
            'categories' => $categories,
            'category_name' => $category_name,
        ]);
    }
}
