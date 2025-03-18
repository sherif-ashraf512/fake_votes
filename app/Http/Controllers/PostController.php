<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request){
      $validateData = $request->validate([
        'description' => 'required',
      ]);

      $validateData['user_id'] = $request->user()->id;
      Post::create($validateData);

      flash()->options(['timeout' => 3000,'position' => 'top-center',])->success('Post save successfully');
      return redirect()->back();
    }
}
