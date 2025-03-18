<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index(){
      $posts = Post::orderByDesc('id')->paginate(5);
      return view('content.admin.community.index',compact('posts'));
    }
}
