<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
  use HasFactory;
  protected $guard = 'admin';
  protected $fillable = [
    'category_id',
    'sub_category_name',
    'sub_category_image',
  ];
}
