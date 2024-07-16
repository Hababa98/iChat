<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Make sure this line is present
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;


class Vendor extends Authenticatable
{
  use HasApiTokens, HasFactory, HasProfilePhoto, HasTeams, Notifiable, TwoFactorAuthenticatable;

  protected $fillable = [
    'name',
    'email',
    'username',
    'password',
    'mobile',
    'otp',
    'image',
    'status',
    'login_type',
    'device_token',
    'country_code',
  ];
}
