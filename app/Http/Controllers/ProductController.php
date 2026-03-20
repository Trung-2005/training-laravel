<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function quantity($soLuong) {
        return view('product', ['soLuong' => $soLuong]);
        // return view('product', compact('soLuong'));
        // return view('product')->with('soLuong', $soLuong);

    }
}
