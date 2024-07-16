<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Dashboard extends Controller
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
    // Fetch data from Firebase Realtime Database
    $usersSnapshot = $this->database->getReference('user')->getSnapshot();
    $groupsSnapshot = $this->database->getReference('group')->getSnapshot();
    $usersCount = $usersSnapshot->numChildren();
    $groupsCount = $groupsSnapshot->numChildren();
    $callsSnapshot = $this->database->getReference('call_history')->getSnapshot();

    // Total Video calls & Audio calls
    $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $totalVoiceCallsByMonth = array_fill_keys($monthNames, 0);
    $totalVideoCallsByMonth = array_fill_keys($monthNames, 0);

    if (!$callsSnapshot->exists()) {
      // If calls data is empty, set default values
      $monthCountData = [];
    } else {
      foreach ($callsSnapshot->getValue() as $call) {
        if (isset($call['callType']) && isset($call['time'])) {
          // Convert milliseconds to seconds by dividing by 1000
          $date = Carbon::createFromTimestamp($call['time'] / 1000);
          $monthName = $date->format('M');
          if ($call['callType'] === 'voice') {
            $totalVoiceCallsByMonth[$monthName]++;
          } elseif ($call['callType'] === 'video') {
            $totalVideoCallsByMonth[$monthName]++;
          }
        }
      }

      $monthCountData = [];
      foreach ($monthNames as $month) {
        $monthCountData[] = [
          'x' => $month,
          'videoCalls' => $totalVideoCallsByMonth[$month],
          'voiceCalls' => $totalVoiceCallsByMonth[$month],
        ];
      }
    }

    // Total Users
    $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    if ($usersCount > 0) {
      $userData = $usersSnapshot->getValue();

      $monthCount = array_fill_keys($monthNames, 0);

      foreach ($userData as $user) {
        if (isset($user['date'])) {
          // Convert milliseconds to seconds by dividing by 1000
          $date = Carbon::createFromTimestamp($user['date'] / 1000);
          $monthName = $date->format('M');
          $monthCount[$monthName]++;
        }
      }


      $monthCountDatauser = [];
      foreach ($monthCount as $month => $count) {
        $monthCountDatauser[] = ['x' => $month, 'y' => $count];
      }
    }

    return view(
      'content.apps.dashboard',
      compact(
        'usersCount',
        'groupsCount',
        'monthCountData',
        'monthCountDatauser',
        'totalVoiceCallsByMonth',
        'totalVideoCallsByMonth',
        'monthNames'
      )
    );
  }
}
