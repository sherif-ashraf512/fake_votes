<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use HasFactory, Notifiable;


  /**
   * Get the orders associated with the user.
   */
  public function orders()
  {
    return $this->hasMany(Order::class);
  }
  /**
   * Get the reviews written by the user.
   */
  public function reviews()
  {
    return $this->hasMany(Review::class);
  }

  public function votes()
  {
    return $this->hasMany(UsersVote::class);
  }
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'type',
    'image',
    'identify_image',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }
}
