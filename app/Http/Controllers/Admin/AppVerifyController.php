<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppVerfiy;
use Exception;
use Illuminate\Http\Request;

class AppVerifyController extends Controller
{
  public function index()
  {
    $data = AppVerfiy::first();
    // dd($datas);
    return view('admin.app_verfiy.index', compact('data'));
  }
  function getPurchaseCode(Request $request)
  {
    $personalToken = "mpklQEe4VidHn1FMchvOx2PFZRp0WCfU";

    $code = trim($request->purchase_code);

    if (!preg_match("/^([a-f0-9]{8})-(([a-f0-9]{4})-){3}([a-f0-9]{12})$/i", $code)) {
      return redirect()->back()->with('error', 'Invalid purchase code...!');
    }
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => "https://api.envato.com/v3/market/author/sale?code=$code",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 20,
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer $personalToken",
        "User-Agent: Purchase code verification script"
      )
    ));
    $response = @curl_exec($ch);
    $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (curl_errno($ch) > 0) {
      return redirect()->back()->with('error', "Failed to connect: " . curl_error($ch));
    }

    switch ($responseCode) {
      case 404:
        return redirect()->back()->with('error', "Something went wrong!!!");
      case 403:
        return redirect()->back()->with('error', "The purchase code is invalid or has been deleted.");
      case 401:
        return redirect()->back()->with('error', "The purchase code is invalid or has been deleted.");
    }

    if ($responseCode !== 200) {
      return redirect()->back()->with('error', "Got status {$responseCode}, try again shortly");
    }

    $body = @json_decode($response);

    if ($body === false && json_last_error() !== JSON_ERROR_NONE) {
      throw new Exception("Error parsing response, try again");
      return redirect()->back()->with('error', "Error parsing response, try again");
    }

    return redirect()->back()->with('success', "Purchase code verified");
  }
}
