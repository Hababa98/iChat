<?php

namespace App\Models;

use App\Models\ProductImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;
  protected $guard = 'admin';
  protected $fillable = [
    'category_id',
    'sub_category_id',
    'product_name',
    'product_image',
    'product_price',
    'product_sale_price',
    'product_review',
    'product_size',
    'product_color',
    'product_discount',
    'product_about',
    'status',
    'brand_id',
  ];

  public function productImages()
  {
    return $this->hasMany(ProductImages::class, 'product_id', 'id');
  }
}
