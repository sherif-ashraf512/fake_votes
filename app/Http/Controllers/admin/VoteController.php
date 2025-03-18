<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index(){
      $votes = Vote::paginate(10);
      return view('content.admin.votes.index',compact('votes'));
    }

    public function store(Request $request){
      $validateData = $request->validate([
        'title' => 'required',
        'option1' => 'required',
        'option2' => 'required',
        'option3' => 'sometimes',
        'option4' => 'sometimes',
        'start' => 'required',
        'end' => 'required',
      ]);

      Vote::create($validateData);
      flash()->options(['timeout' => 3000,'position' => 'top-center',])->success('Vote save successfully');
      return redirect()->back();
    }

    public function edit(Vote $vote){
      return view('content.admin.votes.edit',compact('vote'));
    }

    public function update(Request $request, Vote $vote){
      $validateData = $request->validate([
        'title' => 'required',
        'option1' => 'required',
        'option2' => 'required',
        'option3' => 'sometimes',
        'option4' => 'sometimes',
        'start' => 'required',
        'end' => 'required',
      ]);

      $vote->update($validateData);
      flash()->options(['timeout' => 3000,'position' => 'top-center',])->success('Vote update successfully');
      return redirect()->route('vote-list');
    }

    public function destroy(Vote $vote){
      $vote->delete();
      flash()->options(['timeout' => 3000,'position' => 'top-center',])->success('Vote delete successfully');
      return redirect()->route('vote-list');
    }

    public function show($id){
      $vote = Vote::find($id);
      return view('content.admin.votes.show',compact('vote'));
    }

    public function list(){
      date_default_timezone_set('Africa/Cairo');

      $votes = Vote::where('start','<=',date('Y-m-d H:i:s'))
      ->where('end','>=',date('Y-m-d H:i:s'))
      ->paginate(10);


      return view('content.admin.votes.list',compact('votes'));
    }
}
