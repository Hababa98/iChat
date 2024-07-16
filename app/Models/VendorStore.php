<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorStore extends Model
{
  use HasFactory;
  protected $fillable = [
    'store_name', 'vendor_id', 'business_email', 'vat_gstin_no', 'mobile', 'store_address', 'country_code', 'store_logo', 'vendor_request'
  ];
  public function storeImages()
  {
    return $this->hasMany(StoreImages::class, 'store_id', 'id');
  }
  public function vendorDetail()
  {
    return $this->hasOne(Vendor::class, 'id', 'vendor_id');
  }
}
