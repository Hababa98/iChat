<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCurrencies extends Model
{
  use HasFactory;
  protected $fillable = [
    'country_id',
    'currency_id',
    'code_id',
  ];
  public function country()
  {
    return $this->hasOne(CountryDetail::class, 'id', 'country_id');
  }
  public function currency()
  {
    return $this->hasOne(CountryDetail::class, 'id', 'currency_id');
  }
  public function code()
  {
    return $this->hasOne(CountryDetail::class, 'id', 'code_id');
  }
  public function symbol()
  {
    return $this->hasOne(CountryDetail::class, 'id', 'symbol_id');
  }
}