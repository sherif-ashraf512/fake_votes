<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
      $reviews = Review::orderBy('id','desc')->paginate(4);
      return view('content.admin.reviews.index',compact('reviews'));
    }
}
