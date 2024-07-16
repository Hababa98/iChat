<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth;
use Illuminate\Http\Request;

class BlockUser extends Controller
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
    return view('content.apps.block-list');
  }

  // public function getBlockData(Request $request)
  // {
  //   $draw = $request->get('draw');
  //   $start = $request->get("start");
  //   $rowperpage = $request->get("length");
  //   $searchValue = $request->get('search')['value'];

  //   $database = app('firebase.database');
  //   $userRef = $database->getReference('user');
  //   $blockRef = $database->getReference('block');

  //   $blockSnapshot = $blockRef->getValue();

  //   $filteredData = [];
  //   foreach ($blockSnapshot as $blockId => $blockData) {
  //     // Fetch user ID directly from the block data
  //     $userId = $blockId;

  //     // Fetch user data based on the user ID
  //     $userData = $userRef->getChild($userId)->getValue();

  //     // Check if the name matches the search value
  //     if (stripos($userData['name'], $searchValue) !== false) {

  //       $filteredData[] = [
  //         'uid' => $userId,
  //         'mobile' => $userData['mobile'],
  //         'name' => $userData['name'],
  //         'countryCode' => $userData['countryCode'],
  //         'countryname' => $userData['countryname'],
  //         'status' => $userData['status'],
  //         'img' => $userData['img'],
  //         "action" => ''
  //       ];
  //     }
  //   }

  //   // Apply pagination
  //   $totalRecords = count($filteredData);
  //   $filteredData = array_slice($filteredData, $start, $rowperpage);

  //   $response = array(
  //     "draw" => intval($draw),
  //     "iTotalRecords" => $totalRecords,
  //     "iTotalDisplayRecords" => $totalRecords,
  //     "aaData" => $filteredData
  //   );
  //   return response()->json($response);
  // }

  // Datatables
  public function getBlockData(Request $request)
  {
    $draw = $request->get('draw');
    $start = $request->get('start');
    $rowperpage = $request->get('length');
    $searchValue = $request->get('search')['value'];

    $database = app('firebase.database');
    $userRef = $database->getReference('user');
    $blockRef = $database->getReference('block');

    $blockSnapshot = $blockRef->getValue();

    if (empty($blockSnapshot)) {
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
    foreach ($blockSnapshot as $blockId => $blockData) {
      $userId = $blockId;

      $userData = $userRef->getChild($userId)->getValue();
      $blockCount = 0;

      // Count the number of blocks associated with this user
      foreach ($blockData as $key => $value) {
        if ($key === 'id') {
          $blockCount = count($value);
          break;
        }
      }

      // Check if the name matches the search value
      if (stripos($userData['name'], $searchValue) !== false) {
        $filteredData[] = [
          'uid' => $userId,
          'mobile' => $userData['mobile'],
          'name' => $userData['name'],
          'countryCode' => $userData['countryCode'],
          'countryname' => $userData['countryname'],
          'status' => $userData['status'],
          'img' => $userData['img'],
          'block_count' => $blockCount,
          'action' => '',
        ];
      }
    }

    $totalBlockIds = count($blockSnapshot);

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
}
