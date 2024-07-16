<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
  use HasFactory;
  protected $guard = 'admin';
  protected $fillable = [
    'user_id',
    'product_id',
    'review_star',
    'review_message',
  ];
  public function productImages()
  {
    return $this->hasMany(ProductImages::class, 'id', 'product_id');
  }
}
