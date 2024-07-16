<?php

use App\Http\Controllers\apps\AgoraKey;
use App\Http\Controllers\apps\AppSetting;
use App\Http\Controllers\apps\BlockUser;
use App\Http\Controllers\apps\BlockUserView;
use App\Http\Controllers\apps\Dashboard;
use App\Http\Controllers\apps\GroupController;
use App\Http\Controllers\apps\GroupSetting;
use App\Http\Controllers\apps\GroupViewController;
use App\Http\Controllers\apps\NotificationController;
use App\Http\Controllers\apps\PrivacyPolicy;
use App\Http\Controllers\apps\SuspendUser;
use App\Http\Controllers\apps\TermsCondition;
use App\Http\Controllers\apps\WallpaperController;
use Illuminate\Support\Facades\Route;

$controller_path = 'App\Http\Controllers';

// authentication
Route::get('/', $controller_path . '\authentications\LoginBasic@index')->name('login');
Route::post('/auth/login', $controller_path . '\authentications\LoginBasic@login')->name('auth-login');

$controller_path = 'App\Http\Controllers';

// Dashboard
Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard');

// Users
Route::get('/app/user/list', $controller_path . '\apps\UserList@index')->name('app-user-list');
Route::get('/app/user/list/data', $controller_path . '\apps\UserList@getUserListData')->name('app-user-list-data');
Route::post('/app/user/delete/{id}', $controller_path . '\apps\UserList@deleteUser')->name('app-user-delete');
Route::get('/app/user/logout', $controller_path . '\apps\UserList@logout')->name('logout');
Route::post('/app/user/suspend/{id}', $controller_path . '\apps\UserList@suspendUser')->name('app-user-suspend');

// Groups
Route::get('groups-list', [GroupController::class, 'index'])->name('groups-list');
Route::get('getgroupdata', [GroupController::class, 'getGroupData'])->name('getgroupdata');
Route::post('groups-delete/{id}', [GroupController::class, 'deleteGroup'])->name('groups-delete');

// GroupView
Route::get('group-view/{id}', [GroupViewController::class, 'index'])->name('group-view');
Route::get('getgroupviewdata/{id}', [GroupViewController::class, 'getGroupViewData'])->name('getgroupviewdata');




// Wallpapers
Route::get('wallpapers-list', [WallpaperController::class, 'index'])->name('wallpapers-list');
Route::get('getwallpaperdata', [WallpaperController::class, 'getWallpaperData'])->name('getwallpaperdata');
Route::get('wallpapers-add', [WallpaperController::class, 'addWallpaper'])->name('wallpapers-add');
Route::post('wallpapers-save', [WallpaperController::class, 'saveWallpaper'])->name('wallpapers-save');
Route::post('wallpapers-delete/{id}', [WallpaperController::class, 'deleteWallpaper'])->name(
  'wallpapers-delete'
);
Route::get('wallpapers-status/{id}',  [WallpaperController::class, 'ChangeWallpaperStatus'])->name('wallpapers-status');


// Notification
Route::get('notifications-list', [NotificationController::class, 'index'])->name('notifications-list');
Route::get('getnotificationdata', [NotificationController::class, 'getNotificationData'])->name('getnotificationdata');
Route::get('notifications-add', [NotificationController::class, 'addNotification'])->name('notifications-add');
Route::post('notifications-save', [NotificationController::class, 'saveNotification'])->name('notifications-save');
Route::post('notifications-delete/{id}', [NotificationController::class, 'deleteNotification'])->name(
  'notifications-delete'
);

// Block User
Route::get('block-list', [BlockUser::class, 'index'])->name('block-list');
Route::get('getblockdata', [BlockUser::class, 'getBlockData'])->name('getblockdata');

// Block User View
Route::get('block-view/{id}', [BlockUserView::class, 'index'])->name('block-view');
Route::get('getblockviewdata/{id}', [BlockUserView::class, 'getBlockViewData'])->name('getblockviewdata');

// Settings
Route::get('appsetting-add', [AppSetting::class, 'index'])->name('appsetting-add');
Route::post('appsetting-save', [AppSetting::class, 'saveAppSetting'])->name('appsetting-save');

Route::get('agorakey-add', [AgoraKey::class, 'index'])->name('agorakey-add');
Route::post('agorakey-save', [AgoraKey::class, 'saveAgoraKey'])->name('agorakey-save');

Route::get('groupsetting-add', [GroupSetting::class, 'index'])->name('groupsetting-add');
Route::post('groupsetting-save', [GroupSetting::class, 'saveGroupSetting'])->name('groupsetting-save');

Route::get('privacypolicy-add', [PrivacyPolicy::class, 'index'])->name('privacypolicy-add');
Route::post('privacypolicy-save', [PrivacyPolicy::class, 'savePrivacyPolicy'])->name('privacypolicy-save');

Route::get('termcondition-add', [TermsCondition::class, 'index'])->name('termcondition-add');
Route::post('termcondition-save', [TermsCondition::class, 'saveTermCondition'])->name('termcondition-save');

// Suspend User
Route::get('suspend-list', [SuspendUser::class, 'index'])->name('suspend-list');
Route::get('getsuspenddata', [SuspendUser::class, 'getSuspendData'])->name('getsuspenddata');
Route::post('reactivate/{id}', [SuspendUser::class, 'ReactivateUser'])->name('reactivate');

// Logout
Route::get('/auth/logout', $controller_path . '\authentications\LoginBasic@logout')->name('auth-logout');
