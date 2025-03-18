<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomePage extends Controller
{
  public function index()
  {
    $reviews = Review::limit(10)->orderBy('id','desc')->get();

    $Products = Product::orderBy('id','desc')->get();
    // dd($Products)
    return view('content.admin.index',compact('reviews','Products'));

  }
  public function makeOrder($id)
  {
   $Order = new Order;
   $Order->user_id = auth()->user()->id;
   $Order->product_id = $id;
   $Order->status = "completed";
   $Order->save();
   Session::flash('message', 'Order placed.'); 
   Session::flash('alert-class', 'alert-success'); 

    return redirect()->back();
   
  }
  public function makeOrderReview(Request $request, $id)
  {
    $review = new Review;
    $review->user_id = auth()->user()->id;
    $review->product_id = $id;
    $review->description = $request->comment;
    $review->stars = $request->rating;
    $review->save();

    Session::flash('message', 'Review submitted successfully.'); 
    Session::flash('alert-class', 'alert-success');

    return redirect()->back();
  }
}
