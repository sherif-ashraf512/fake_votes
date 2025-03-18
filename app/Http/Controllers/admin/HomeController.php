<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
      $products = Product::count();
      $reviews = Review::count();
      $orders = Order::count();
      return view('content.admin.index',compact('products','reviews','orders'));
    }
}
