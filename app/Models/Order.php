<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
      'user_id',
      'product_id',
      'status',
    ];

    public function product() : BelongsTo {
      return $this->belongsTo(Product::class);
    }
}
