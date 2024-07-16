<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('vendor_stores', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('vendor_id');
      $table->string('store_name');
      $table->string('business_email')->unique();;
      $table->string('vat_gstin_no');
      $table->string('country_code');
      $table->string('mobile');
      $table->string('store_address');
      $table->string('store_logo');
      $table->foreign('vendor_id')->references('id')->on('vendors');
      $table->timestamps();
    });
  }
  public function down(): void
  {
    Schema::dropIfExists('vendor_stores');
  }
};