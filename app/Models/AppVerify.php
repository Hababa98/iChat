<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppVerfiy extends Model
{
  use HasFactory;
  protected $table = 'app_verfiys';
  protected $fillable = ['email', 'purchase_code', 'package_name', 'url', 'status'];
}
