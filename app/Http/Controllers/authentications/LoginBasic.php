<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\FirebaseService;
use Illuminate\Support\Facades\Session;

class LoginBasic extends Controller
{
  protected $firebaseService;
  public function __construct(FirebaseService $firebaseService)
  {
    $this->firebaseService = $firebaseService;
  }
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-login-basic', ['pageConfigs' => $pageConfigs]);
  }
  public function login(Request $request)
  {
    $rules = [
      'email' => 'required',
      'password' => 'required',
    ];

    $customMessages = [
      'email.required' => 'Please enter your email',
      'password.required' => 'Please enter your password',
    ];
    $this->validate($request, $rules, $customMessages);
    $credentials = $request->only('email', 'password');

    try {
      $user = $this->firebaseService->loginUser($credentials['email'], $credentials['password']);
      return redirect()->route('dashboard');
    } catch (\Exception $e) {
      return redirect()
        ->back()
        ->with('message', 'Invalid creditials');
    }

    // if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
    //   // dd("login success");

    // } else {
    //   // dd("login failed");
    //   return redirect()->back()->with('message', 'Invalid creditials');
    // }
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('login');
  }
}
