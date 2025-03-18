<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Register extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.register', ['pageConfigs' => $pageConfigs]);
  }

  public function register(Request $request){
    $validateData = $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:6',
    ]);

    User::create($validateData);

    return redirect()->route('login-page');
  }
}
