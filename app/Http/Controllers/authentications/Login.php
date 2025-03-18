<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.login', ['pageConfigs' => $pageConfigs]);
  }

  public function login(Request $request){
    $credential = $request->validate([
      'email' => 'email|required',
      'password' => 'required',
    ]);

    $user = User::where('email',$request->email)->first();

    if($user && Auth::attempt($credential,$request->remember)){
      $request->session()->regenerate();

      if($user->type == 'user'){
        return redirect()->intended(route('pages-home'));
      }elseif($user->type == 'admin'){
        return redirect()->intended(route('admin-home'));
      }
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
  }
}
