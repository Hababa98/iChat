<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppVerfiy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
  public function getLogin()
  {
    $admin_check = Admin::where('is_admin', 1)->count();
    return route('adminLoginPost');
  }


  public function validation(Request $request)
  {
    $this->validate($request, [
      'code' => 'required',
      'url' => 'required',
    ]);

    $url = $request->url;
    $code = $request->code;
    $domain = request()->getSchemeAndHttpHost() . "/";
    if ($url == request()->getSchemeAndHttpHost() || $url == $domain) {
      // $envantoController = new EnvantoController();
      // $response = $envantoController->validate_code($code, $url);

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://theprimoapp.com/projectvalidation.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('url' => $url, 'purchase_code' => $code),
      ));

      // dd($curl);
      $response = curl_exec($curl);
      // dd($response);
      curl_close($curl);

      $data = json_decode($response);

      if ($data->status == 200) {
        $appVerify = new AppVerfiy();
        $appVerify->purchase_code = $code;
        $appVerify->url = $url;
        $appVerify->save();
        $new_password = $data->code;
        $appVerifyId = $appVerify->id;
        return view('admin.authentication.login', compact('new_password', 'appVerifyId'));
      } else {
        return redirect(url('admin/login'))->with('error', $data->data);
      }
    } else {
      return redirect(url('admin/login'))->with('error', "invalid url");
    }
  }
  public function new_admin(Request $request)
  {
    $this->validate($request, [
      'email' => 'required',
      'password' => 'required',
      // 'project_code' => 'required'
    ]);

    $user = Admin::create([
      'name' => "admin",
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'is_admin' => 1,
      'mobile' => "",
      'profile_pic' => "",
    ]);

    $curl = curl_init();
    $app_verify_id = $request->app_verify_id;
    $email = $user->email;
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://theprimoapp.com/updatevalidation.php',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('email' => $email, 'app_verify_id' => $app_verify_id),
    ));

    // dd($curl);
    $response = curl_exec($curl);
    // dd($response);
    curl_close($curl);

    $data = json_decode($response);
    AppVerfiy::where('id', $request->app_verify_id)->update(['email' => $user->email]);
    if ($user) {
      return redirect('admin/login');
    }
  }

  public function postLogin(Request $request)
  {

    // dd($request->input('email'));
    try {
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
      ]);


      if (Auth::guard('admin')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])) {
        $user = auth()->guard('admin')->user();
        if ($user->is_admin == 1) {
          // dd($user);
          // dd($user);
          return redirect()->route('index')->with('success', 'You are Logged in sucessfully.');
        } else {
          return back()->with('error', 'Whoops! Invalid email or password.');
        }
      } else {
        return back()->with('error', 'Whoops! Invalid email or password.');
      }
    } catch (\Throwable $th) {
      //throw $th;
      dd($th->getMessage());
    }
  }

  public function adminLogout(Request $request)
  {
    auth()->guard('admin')->logout();
    Session::flush();
    Session::put('success', 'You are logout sucessfully');
    return redirect(route('adminLogin'));
  }

  public function dashboard(Request $request)
  {
    return view('admin.dashboard');
  }
}
