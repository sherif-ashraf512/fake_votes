<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function sendMessage(Request $request){
      $validateData = $request->validate([
        'full_name' => 'required',
        'email' => 'required',
        'message' => 'required',
      ]);

      Message::create($validateData);
      return redirect()->back()->with('success' , 'Message sent successfully ✅');
    }
}
