<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
      $reviews = Review::limit(10)->orderBy('id','desc')->get();
      $latestProducts = Product::limit(6)->orderBy('id','desc')->get();

      return view('content.front.index',compact('reviews','latestProducts'));
    }
}
