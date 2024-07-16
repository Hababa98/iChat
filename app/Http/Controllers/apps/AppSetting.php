<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth;
use Illuminate\Http\Request;

class AppSetting extends Controller
{
  protected $database;
  protected $tablename;
  protected $auth;
  public function __construct(Database $database, Auth $auth)
  {
    $this->database = $database;
    $this->auth = $auth;
  }

  public function index()
  {
    $appSetting = $this->database->getReference('app_setting')->getValue();
    return view('content.apps.appsetting-add', compact('appSetting'));
  }

  public function saveAppSetting(Request $request)
  {
    $request->validate(
      [
        'name' => 'required',
        'text' => 'required',
        'color' => 'required',
        'logo' => 'nullable|image',
      ],
      [
        'name.required' => 'Please enter app name.',
        'text.required' => 'Please enter app text.',
      ]
    );

    // Retrieve existing app settings
    $existing_app_setting = $this->database->getReference('app_setting')->getValue();
    // Function to convert hexadecimal color to RGB format

    // if (
    //   $request->input('email') !== $existing_app_setting['email'] ||
    //   $request->input('name') !== $existing_app_setting['name'] ||
    //   $request->input('server_key') !== $existing_app_setting['server_key'] ||
    //   $request->input('color') !== $existing_app_setting['color'] ||
    //   $request->input('logo') !== $existing_app_setting['logo'] ||
    //   $request->input('text') !== $existing_app_setting['text']
    // ) {
    //   // If different, show error message and redirect back
    //   return redirect()->back()->with('error', 'You are not allowed to change the App Details.');
    // }

    function hexToRgb($hex)
    {
      // Remove '#' if it exists
      $hex = str_replace('#', '', $hex);

      // Get individual color components
      $r = hexdec(substr($hex, 0, 2));
      $g = hexdec(substr($hex, 2, 2));
      $b = hexdec(substr($hex, 4, 2));

      // Return RGB format
      return "$r, $g, $b";
    }
    // dd(hexToRgb($request->input('color')));
    // Update only the fields that are provided in the request
    $app_setting = [
      // 'name' => $request->input('name'),
      // 'email' => $request->input('email'),
      // 'server_key' => $request->input('server_key'),
      // 'text' => $request->input('text'),
      // 'color' => hexToRgb($request->input('color')),
      'name' => $request->input('name') ?? $existing_app_setting['name'],
      'email' => $request->input('email') ?? $existing_app_setting['email'],
      'server_key' => $request->input('server_key') ?? $existing_app_setting['server_key'],
      'text' => $request->input('text') ?? $existing_app_setting['text'],
      'color' => hexToRgb($request->input('color')) ?? $existing_app_setting['color'],
      'logo' => $existing_app_setting['logo'],
      'agora_key' => $existing_app_setting['agora_key'],
      'group_member' => $existing_app_setting['group_member'], // Retain the existing group_member
      'privacy_policy' => $existing_app_setting['privacy_policy'], // Retain the existing privacy_policy
      'term_condition' => $existing_app_setting['term_condition'], // Retain the existing privacy_policy
    ];

    // If a new logo is uploaded, update the logo field
    if ($request->hasFile('logo')) {
      $image = $request->file('logo');
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('assets/images'), $imageName);
      $app_setting['logo'] = $imageName;
    }

    // Temporary workaround to disable SSL verification
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://whoxanew-default-rtdb.firebaseio.com/app_setting.json');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification
    $response = curl_exec($ch);
    if ($response === false) {
      echo 'cURL error: ' . curl_error($ch);
    }
    curl_close($ch);

    $this->database->getReference('app_setting')->set($app_setting);

    return redirect()
      ->route('appsetting-add')
      ->with('message', 'App Details updated successfully');
  }
}
