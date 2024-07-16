<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth;

class UserAuthController extends Controller
{
  protected $database;
  protected $tablename;
  protected $auth;
  public function __construct(Database $database, Auth $auth)
  {
    $this->database = $database;
    $this->auth = $auth;
  }

  public function getAppSetting(Request $request)
  {
    // Get the app_setting data from Firebase
    $appSetting = $this->database->getReference('app_setting')->getValue();

    // Check if app_setting exists
    if (!$appSetting) {
      return response()->json([
        'status' => false,
        'message' => 'App settings not found.',
        'app_setting' => null,
      ]);
    }

    if (isset($appSetting['logo'])) {
      // Update the logo field to contain the complete URL
      $appSetting['logo'] = url('public/assets/images/' . $appSetting['logo']);
    }

    return response()->json([
      'status' => true,
      'message' => 'App settings retrieved successfully.',
      'app_setting' => $appSetting,
    ]);
  }

  public function getWallpaper(Request $request)
  {
    $wallpaper = $this->database->getReference('wallpaper')->getValue();

    if (!$wallpaper) {
      return response()->json([
        'status' => false,
        'message' => 'Wallpaper not found.',
        'wallpapers' => [],
      ]);
    }

    $imageUrls = [];

    foreach ($wallpaper as $item) {
      if (isset($item['image'])) {
        $imageUrls[] = url('public/assets/images/' . $item['image']);
      }
    }

    return response()->json([
      'status' => true,
      'message' => 'Wallpapers retrieved successfully.',
      'wallpapers' => $imageUrls,
    ]);
  }
}
