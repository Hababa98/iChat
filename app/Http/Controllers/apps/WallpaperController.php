<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth;
use Illuminate\Http\Request;

class WallpaperController extends Controller
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
    return view('content.apps.wallpapers-list');
  }

  // Datatables
  public function getWallpaperData(Request $request)
  {
    $draw = $request->get('draw');
    $start = $request->get('start');
    $rowperpage = $request->get('length');
    $searchValue = $request->get('search')['value'];

    $database = app('firebase.database');
    $userRef = $database->getReference('wallpaper');

    $userSnapshot = $userRef->getValue();
    if (empty($userSnapshot)) {
      // Return response indicating no data found
      $response = [
        'draw' => intval($draw),
        'iTotalRecords' => 0,
        'iTotalDisplayRecords' => 0,
        'aaData' => [],
      ];
      return response()->json($response);
    }

    // Convert data to an array for sorting
    $filteredData = [];
    foreach ($userSnapshot as $id => $userData) {
      if (stripos($userData['name'], $searchValue) !== false) {
        $filteredData[] = [
          'id' => $id,
          'name' => $userData['name'],
          'status' => $userData['status'],
          'image' => $userData['image'],
          'action' => '',
        ];
      }
    }

    // Sort data by ID in descending order (assuming ID is a timestamp)
    usort($filteredData, function ($a, $b) {
      return $b['id'] <=> $a['id'];
    });

    // Apply pagination after sorting
    $totalRecords = count($filteredData);
    $filteredData = array_slice($filteredData, $start, $rowperpage);

    $response = [
      'draw' => intval($draw),
      'iTotalRecords' => $totalRecords,
      'iTotalDisplayRecords' => $totalRecords,
      'aaData' => $filteredData,
    ];
    return response()->json($response);
  }


  // Add Wallpaper
  public function addWallpaper()
  {
    return view('content.apps.wallpapers-add');
  }

  public function saveWallpaper(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'image' => 'required',
    ], [
      'name.required' => 'Please enter wallpaper name.',
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('assets/images'), $imageName);
    }

    $wallpaper = [
      'name' => $request->input('name'),
      'status' => $request->input('status') ? 1 : 0,
      'image' => $imageName,
    ];

    $this->database->getReference('wallpaper')->push($wallpaper);

    return redirect()
      ->route('wallpapers-list')
      ->with('message', 'Wallpaper added successfully');
  }


  // ChangeWallpaperStatus
  public function ChangeWallpaperStatus($id, Request $request)
  {
    $status = $request->status == 1 ? 0 : 1;

    // Get a reference to the Firebase database
    $database = app('firebase.database');
    $wallpaperRef = $database->getReference('wallpaper/' . $id);

    $wallpaper = $wallpaperRef->getSnapshot()->getValue();
    if ($wallpaper === null) {
      return response()->json(['error' => 'Wallpaper not found']);
    }

    $wallpaperRef->update(['status' => $status]);

    return response()->json(['message' => 'Status changed successfully', 'status' => $status]);
  }

  // deleteWallpaper
  public function deleteWallpaper($id)
  {
    $userRef = $this->database->getReference('wallpaper')->getChild($id);

    // Check if the user exists
    if (!$userRef->getValue()) {
      return response()->json(['success' => false]);
    }

    $userRef->remove();
    return response()->json(['success' => true]);
  }
}
