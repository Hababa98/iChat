<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register()
  {
    // $serviceAccount = ServiceAccount::fromJsonFile(env('whoxanew-firebase-adminsdk-s2kfl-f48c34be38.json'));

    // $firebase = (new Factory)
    //     ->withServiceAccount($serviceAccount)
    //     ->withDatabaseUri(env('https://whoxanew-default-rtdb.firebaseio.com/'))
    //     ->create();

    // $this->app->instance(Firebase::class, $firebase);
  }
  /**php
   * Bootstrap services.
   */
  public function boot(): void
  {
    //
  }
}
