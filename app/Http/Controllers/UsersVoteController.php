<?php

namespace App\Http\Controllers;

use App\Models\UsersVote;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersVoteController extends Controller
{
  public function vote(Request $request , $vote_id){
    $request->validate([
      'option' => 'required',
    ]);

    date_default_timezone_set('Africa/Cairo');

    $vote = Vote::find($vote_id);

    if($vote->end < now()){
      flash()->options(['timeout' => 3000,'position' => 'top-center',])->error('Vote is closed');
      return redirect()->route('vote-user-list');
    }

    if(UsersVote::where('user_id' , Auth::user()->id)->where('vote_id' , $vote_id)->exists()){
      flash()->options(['timeout' => 3000,'position' => 'top-center',])->error('You have already voted');
      return redirect()->route('vote-user-list');
    }

    switch ($request->option) {
      case '1':
        $vote->opt1_count = $vote->opt1_count + 1;
        break;
      case '2':
        $vote->opt2_count = $vote->opt2_count + 1;
        break;
      case '3':
        $vote->opt3_count = $vote->opt3_count + 1;
        break;
      case '4':
        $vote->opt4_count = $vote->opt4_count + 1;
        break;
    }

    $vote->save();

    UsersVote::create([
      'user_id' => Auth::user()->id,
      'vote_id' => $vote_id,
      'option' => $request->option,
    ]);

    flash()->options(['timeout' => 3000,'position' => 'top-center',])->success('Vote save successfully');
    return redirect()->route('vote-user-list');
  }
}
