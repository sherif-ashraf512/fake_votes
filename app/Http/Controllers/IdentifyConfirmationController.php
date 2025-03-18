<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class IdentifyConfirmationController extends Controller
{
  public function update(Request $request){
    $request->validate([
      'identify_image' => 'required|image|mimes:jpg,webp,png,jpeg',
      'image' => 'required|image|mimes:jpg,webp,png,jpeg',
    ]);

    $user = Auth::user();

    if ($request->hasFile('identify_image')) {
      // Get the uploaded file
      $image = $request->file('identify_image');
      $imageName = 'img/Identify/' . Str::uuid() . '_identify.' . $image->getClientOriginalExtension();
      $destinationPath = public_path('assets/img/Identify');
      $image->move($destinationPath, $imageName);
      $user->identify_image = $imageName;
    }

    if ($request->hasFile('image')) {
      // Get the uploaded file
      $image = $request->file('image');
      $imageName = 'img/users_image/' . Str::uuid() . '_identify.' . $image->getClientOriginalExtension();
      $destinationPath = public_path('assets/img/users_image');
      $image->move($destinationPath, $imageName);
      $user->image = $imageName;
    }

    $user->save();

    flash()->options(['timeout' => 3000,'position' => 'top-center',])->success('Identify save successfully');

    return redirect()->back();
  }
}
