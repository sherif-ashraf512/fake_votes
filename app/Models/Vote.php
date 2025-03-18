<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
      'title',
      'option1',
      'option2',
      'option3',
      'option4',
      'opt1_count',
      'opt2_count',
      'opt3_count',
      'opt4_count',
      'start',
      'end',
    ];
}
