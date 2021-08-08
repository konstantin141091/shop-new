<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create() {
        return $this->returnView('pages.checkout');
    }

    public function store(OrderRequest $request) {
        dd($request);
//        dd($request->all());
//        $request->flash();
//        $res = $request->validated();
//        dd($res);

        dd('valid');
    }
}
