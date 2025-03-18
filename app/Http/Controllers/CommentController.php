<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function store(Request $request , $post){
    $validateData = $request->validate([
      'description' => 'required',
    ]);

    $validateData['user_id'] = $request->user()->id;
    $validateData['post_id'] = $post;

    Comment::create($validateData);

    flash()->options(['timeout' => 3000,'position' => 'top-center',])->success('Comment save successfully');
    return redirect()->back();
  }
}
