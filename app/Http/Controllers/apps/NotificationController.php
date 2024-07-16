<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class NotificationController extends Controller
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
    return view('content.apps.notifications-list');
  }

  // Datatables
  public function getNotificationData(Request $request)
  {
    $draw = $request->get('draw');
    $start = $request->get('start');
    $rowperpage = $request->get('length');
    $searchValue = $request->get('search')['value'];

    $database = app('firebase.database');
    $userRef = $database->getReference('notification');

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
    foreach ($userSnapshot as $id => $userData) {
      if (stripos($userData['title'], $searchValue) !== false) {
        $filteredData[] = [
          'id' => $id,
          'title' => $userData['title'],
          'message' => $userData['message'],
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

  // Add Notification
  public function addNotification()
  {
    return view('content.apps.notifications-add');
  }

  public function saveNotification(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'message' => 'required',
    ], [
      'title.required' => 'Please enter notification title.',
      'message.required' => 'Please enter message.',
    ]);

    $notificationData = [
      'title' => $request->input('title'),
      'message' => $request->input('message'),
    ];

    // Store notification in the database
    $notificationRef = $this->database->getReference('notification')->push($notificationData);
    $notificationId = $notificationRef->getKey();

    // Retrieve all user tokens from the database
    $usersRef = $this->database->getReference('user');
    $usersSnapshot = $usersRef->getValue();
    $tokens = [];

    foreach ($usersSnapshot as $userData) {
      if (isset($userData['token'])) {
        $tokens[] = $userData['token'];
      }
    }

    // Send notification to all user tokens
    $this->sendNotificationToTokens($tokens, $notificationData);

    return redirect()
      ->route('notifications-list')
      ->with('message', 'Notification added successfully and sent to all users.');
  }


  // Delete Notification
  public function deleteNotification($id)
  {
    $userRef = $this->database->getReference('notification')->getChild($id);

    // Check if the user exists
    if (!$userRef->getValue()) {
      return response()->json(['success' => false]);
    }

    $userRef->remove();
    return response()->json(['success' => true]);
  }

  // Modify the method to accept an array of tokens
  private function sendNotificationToTokens(array $tokens, $notification)
  {
    $factory = (new Factory)
      ->withServiceAccount('whoxanew-firebase-adminsdk-s2kfl-f48c34be38.json'); // Replace with your Firebase credentials JSON file path

    $messaging = $factory->createMessaging();

    foreach ($tokens as $token) {
      // Send notification to each token
      $message = CloudMessage::withTarget('token', $token)
        ->withNotification(Notification::create($notification['title'], $notification['message']));

      $messaging->send($message);
    }
  }
}
