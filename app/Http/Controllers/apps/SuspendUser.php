<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth;
use Illuminate\Http\Request;

class SuspendUser extends Controller
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
    return view('content.apps.suspend-list');
  }

  public function getSuspendData(Request $request)
  {
    $draw = $request->get('draw');
    $start = $request->get('start');
    $rowperpage = $request->get('length');
    $searchValue = $request->get('search')['value'];

    $database = app('firebase.database');

    // Reference to the suspend_user table
    $suspendUserRef = $database->getReference('suspend_user');
    $suspendUserSnapshot = $suspendUserRef->getSnapshot()->getValue();

    if (empty($suspendUserSnapshot)) {
      // Return response indicating no data found
      $response = [
        'draw' => intval($draw),
        'iTotalRecords' => 0,
        'iTotalDisplayRecords' => 0,
        'aaData' => [],
      ];
      return response()->json($response);
    }

    $filteredData = [];

    // Iterate through each user in suspend_user table
    foreach ($suspendUserSnapshot as $userId => $isSuspended) {
      if ($isSuspended) {
        // Reference to the user table
        $userRef = $database->getReference('user/' . $userId);
        $userData = $userRef->getValue();

        $filteredData[] = [
          'id' => $userId,
          'name' => $userData['name'],
          'mobile' => $userData['mobile'],
          'countryCode' => $userData['countryCode'],
          'countryname' => $userData['countryname'],
          'status' => $userData['status'],
          'img' => $userData['img'],
          'action' => '',
        ];
      }
    }

    // Apply pagination
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

  // Reactivate User
  public function ReactivateUser($id)
  {
    $userRef = $this->database->getReference('suspend_user')->getChild($id);

    if (!$userRef->getValue()) {
      return response()->json(['success' => false]);
    }

    $userRef->remove();
    return response()->json(['success' => true]);
  }
}
