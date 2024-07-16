<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth;
use Illuminate\Http\Request;

class BlockUserView extends Controller
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
    return view('content.apps.block-view', compact('id'));
  }


  // Datatables
  public function getBlockViewData(Request $request, $id)
  {
    $draw = $request->get('draw');
    $start = $request->get("start");
    $rowperpage = $request->get("length");
    $searchValue = $request->input('search.value');

    $database = app('firebase.database');

    // Retrieve data from the group table for the specific Block ID
    $blockRef = $database->getReference('block/' . $id);
    $blockSnapshot = $blockRef->getValue();

    $userDataList = [];

    // Check if the Blocker exists and has users
    if ($blockSnapshot) {
      foreach ($blockSnapshot["id"] as $userId) {
        $userRef = $database->getReference('user/' . $userId);

        $userSnapshot = $userRef->getValue();

        if ($userSnapshot) {
          $userData = [
            'id' => $userId,
            'mobile' => $userSnapshot['mobile'],
            'name' => $userSnapshot['name'],
            'countryCode' => $userSnapshot['countryCode'],
            'countryname' => $userSnapshot['countryname'],
            'img' => $userSnapshot['img']
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

    $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecords,
      "aaData" => $filteredData
    );

    return response()->json($response);
  }
}
