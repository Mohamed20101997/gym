<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::get();
        $classes = Category::with('followUp')->get();

        return view('welcome',compact('products','classes'));
    }
}
