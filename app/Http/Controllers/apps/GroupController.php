<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth;
use Illuminate\Http\Request;

class GroupController extends Controller
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
    return view('content.apps.groups-list');
  }

  // Datatables
  public function getGroupData(Request $request)
  {
    $draw = $request->get('draw');
    $start = $request->get("start");
    $rowperpage = $request->get("length");
    $searchValue = $request->get('search')['value'];

    // Retrieve data from Firebase
    $groupRef = $this->database->getReference('group');
    $groupSnapshot = $groupRef->getValue();

    $filteredData = [];
    if ($groupSnapshot) {
      foreach ($groupSnapshot as $groupId => $groupData) {
        if (stripos($groupData['castName'], $searchValue) !== false) {

          $totalUsers = count($groupData['userId']);
          $createrId = $groupData['createrId'];

          $createrId = is_array($createrId) ? $createrId[0] : $createrId;
          $userRef = $this->database->getReference('user')->getChild($createrId);
          $userData = $userRef->getValue();

          if ($userData) {
            $filteredData[] = [
              'groupId' => $groupId,
              'castName' => $groupData['castName'],
              'createrId' => $createrId,
              'createrName' => $userData['name'],
              'createrImg' => $userData['img'],
              'createrMobile' => $userData['mobile'],
              'createrCountry' => $userData['countryname'],
              'totalUsers' => $totalUsers,
              "action" => ''
            ];
          }
        }
      }
    }

    // Apply pagination
    $totalRecords = count($filteredData);
    $filteredData = array_slice($filteredData, $start, $rowperpage);

    $response = [
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecords,
      "aaData" => $filteredData
    ];
    return response()->json($response);
  }


  // Delete Group
  public function deleteGroup($id)
  {
    $groupRef = $this->database->getReference('group')->getChild($id);

    // Check if the group exists
    if (!$groupRef->getValue()) {
      return response()->json(['success' => false]);
    }

    $groupRef->remove();
    return response()->json(['success' => true]);
  }
}
