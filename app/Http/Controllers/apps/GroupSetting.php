<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth;
use Illuminate\Http\Request;

class GroupSetting extends Controller
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
    $app_setting = $this->database->getReference('app_setting')->getValue();
    return view('content.apps.groupsetting-add', compact('app_setting'));
  }

  public function saveGroupSetting(Request $request)
  {
    $request->validate([
      'group_member' => 'required',
    ], [
      'group_member.required' => 'Please enter group member.',
    ]);

    // Retrieve existing app settings
    $existing_app_setting = $this->database->getReference('app_setting')->getValue();

    // if ($request->input('group_member') !== $existing_app_setting['group_member']) {
    //   // If different, show error message and redirect back
    //   return redirect()->back()->with('error', 'You are not allowed to change the Group Member.');
    // }

    // Update only the fields that are provided in the request
    $app_setting = [
      // 'group_member' => $request->input('group_member'),
      'group_member' => $request->input('group_member') ?? $existing_app_setting['group_member'],
      'name' => $existing_app_setting['name'],
      'email' => $existing_app_setting['email'],
      'server_key' => $existing_app_setting['server_key'],
      'text' => $existing_app_setting['text'],
      'color' => $existing_app_setting['color'],
      'logo' => $existing_app_setting['logo'],
      'agora_key' => $existing_app_setting['agora_key'],
      'privacy_policy' => $existing_app_setting['privacy_policy'],
      'term_condition' => $existing_app_setting['term_condition'],
    ];


    // Temporary workaround to disable SSL verification
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://whoxanew-default-rtdb.firebaseio.com/app_setting.json');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    if ($response === false) {
      echo 'cURL error: ' . curl_error($ch);
    }
    curl_close($ch);

    $this->database->getReference('app_setting')->set($app_setting);

    return redirect()->route('groupsetting-add')->with('message', 'Group Member updated successfully');
  }
}
