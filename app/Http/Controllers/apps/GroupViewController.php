<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth;
use Illuminate\Http\Request;

class GroupViewController extends Controller
{
  protected $database;
  protected $tablename;
  protected $auth;
  public function __construct(Database $database, Auth $auth)
  {
    $this->database = $database;
    $this->auth = $auth;
  }

  public function index($id)
  {
    $reference = $this->database->getReference('user');
    return view('content.apps.group-view', compact('id'));
  }

  // Datatables
  public function getGroupViewData(Request $request, $groupId)
  {
    $draw = $request->get('draw');
    $start = $request->get('start');
    $rowperpage = $request->get('length');
    $searchValue = $request->input('search.value');

    $database = app('firebase.database');

    // Retrieve data from the group table for the specific group ID
    $groupRef = $database->getReference('group/' . $groupId);
    $groupSnapshot = $groupRef->getValue();

    $userDataList = [];

    // Check if the group exists and has users
    if ($groupSnapshot) {
      $createrId = $groupSnapshot['createrId'];

      foreach ($groupSnapshot['userId'] as $userId) {
        $userRef = $database->getReference('user/' . $userId);

        $userSnapshot = $userRef->getValue();

        if ($userSnapshot) {
          $role = $userId == $createrId[0] ? 'Admin' : 'User';
          $userData = [
            'id' => $userId,
            'mobile' => $userSnapshot['mobile'],
            'name' => $userSnapshot['name'],
            'countryCode' => $userSnapshot['countryCode'],
            'countryname' => $userSnapshot['countryname'],
            'img' => $userSnapshot['img'],
            'role' => $role,
          ];

          $userDataList[] = $userData;
        } else {
        }
      }
    }

    // Initialize an array to store filtered user data
    $filteredData = [];
    foreach ($userDataList as $userData) {
      if (stripos($userData['name'], $searchValue) !== false) {
        $filteredData[] = $userData;
      }
    }

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
}
