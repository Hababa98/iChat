<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

class FirebaseService
{
  protected $auth;

  public function __construct()
  {
    $firebase = (new Factory)
      ->withServiceAccount('whoxanew-firebase-adminsdk-s2kfl-f48c34be38.json')
      ->withDatabaseUri('https://my-project-default-rtdb.firebaseio.com');
    // dd($firebase);
    $this->auth = $firebase->createAuth(); //https://whoxanew-default-rtdb.firebaseio.com/
  }

  public function registerUser(string $email, string $password)
  {
    return $this->auth->createUserWithEmailAndPassword($email, $password);
  }

  public function loginUser(string $email, string $password)
  {
    return $this->auth->signInWithEmailAndPassword($email, $password);
  }
}
