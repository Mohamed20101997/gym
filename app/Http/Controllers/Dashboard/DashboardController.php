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

        return view('dashboard.index');

    } //end of index
}
