<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
      'title',
      'description',
      'image',
      'price',
    ];


    public function reviews() : HasMany {
      return $this->hasMany(Review::class);
    }

}
