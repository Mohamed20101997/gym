<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $client = Client::get();
        $categories = Category::get();
        $products = Product::get();
        $serial_numbers = Product::get();
        return view('dashboard.index',compact('client','categories','products','serial_numbers'));

    } //end of index
}
