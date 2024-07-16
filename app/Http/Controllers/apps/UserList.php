<?php

namespace App\Http\Controllers\apps;

// use App\Models\User;
// use Kreait\Firebase\Auth\UserRecord;
// use Kreait\Firebase\Database\Query;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Kreait\Firebase\Auth;
// use Kreait\Firebase\Factory;
// use Kreait\Firebase\ServiceAccount;

class UserList extends Controller
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
    return view('content.apps.app-user-list');
  }

  // Datatables
  public function getUserListData(Request $request)
  {
    $draw = $request->get('draw');
    $start = $request->get('start');
    $rowperpage = $request->get('length');
    $searchValue = $request->get('search')['value'];

    $database = app('firebase.database');
    $userRef = $database->getReference('user');

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

    $filteredData = [];
    foreach ($userSnapshot as $userId => $userData) {
      if (stripos($userData['name'], $searchValue) !== false) {
        $filteredData[] = [
          'uid' => $userId,
          'mobile' => $userData['mobile'],
          'name' => $userData['name'],
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

  // Delete User
  public function deleteUser($id)
  {
    $userRef = $this->database->getReference('user')->getChild($id);

    if (!$userRef->getValue()) {
      return response()->json(['success' => false]);
    }

    $userRef->remove();
    return response()->json(['success' => true]);
  }

  public function suspendUser($id)
  {
    // Check if the user exists in the 'user' table
    $userRef = $this->database->getReference('user')->getChild($id);
    $user = $userRef->getValue();

    if (!$user) {
      return response()->json(['success' => false, 'message' => 'User not found']);
    }

    $suspendUserRef = $this->database->getReference('suspend_user')->getChild($id);
    $suspendUserRef->set(true);

    return response()->json(['success' => true, 'message' => 'User suspended']);
  }
}
