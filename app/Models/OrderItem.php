<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
  use HasFactory;
  protected $guard = 'admin';
  protected $fillable = [
    'user_id',
    'order_id',
    'product_id',
    'coupon_id',
    'payment_id',
    'address_id',
    'product_price',
    'payment_mode',
    'product_color',
    'product_size',
    'quantity',
    'delivery_date',
    'status',
  ];
  public function productImages()
  {
    return $this->hasMany(ProductImages::class, 'product_id', 'product_id');
  }
}
