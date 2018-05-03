<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index($categoryId = null)
    {

        if($categoryId)
            $products = Category::with('products')->find($categoryId)->getRelation('products')->all();
        else
            $products = Product::all();


        $categories = Category::all();

        return view('products.all', compact('products', 'categories', 'categoryId'));
    }
}
