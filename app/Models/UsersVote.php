<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsersVote extends Model
{
    protected $fillable = [
      'vote_id',
      'user_id',
      'option',
    ];


    public function user() : BelongsTo {
      return $this->belongsTo(User::class);
    }

    public function vote() : BelongsTo {
      return $this->belongsTo(Vote::class);
    }

}
