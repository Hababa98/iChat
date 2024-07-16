<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  use HasFactory;
  protected $guard = 'admin';
  protected $fillable = [
    'banner_image',
  ];
}
