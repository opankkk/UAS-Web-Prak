<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
  use HasFactory;
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
  protected $guarded = ['id'];
}
