<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        if(!$id)
            return redirect('/');

        $product = Product::find($id);

        return view('products.details', compact('product'));
    }
}
