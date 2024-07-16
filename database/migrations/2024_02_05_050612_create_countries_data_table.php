<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('countries_data', function (Blueprint $table) {
      $table->id();
      $table->integer('country_id');
      $table->integer('code_id');
      $table->string('status');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('countries');
  }
};
