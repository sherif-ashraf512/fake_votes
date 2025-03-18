<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request , $product) {
      Order::create(['user_id'=>$request->user()->id , 'product_id'=>$product]);
      flash()->options(['timeout' => 3000,'position' => 'top-center',])->success('Order placed successfully');

      return redirect()->back();
    }

}
