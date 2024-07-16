<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\CreateTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EcommerceContactUs extends Controller
{
  public function index()
  {
    return view('content.apps.app-ecommerce-contactus');
  }
  public function contactusList(Request $request)
  {
    $draw = $request->get('draw');
    $start = $request->get("start");
    $rowperpage = $request->get("length"); // Rows display per page

    $columnIndex_arr = $request->get('order');
    $columnName_arr = $request->get('columns');
    $order_arr = $request->get('order');
    $search_arr = $request->get('search');
    $columnIndex = $columnIndex_arr[0]['column']; // Column index
    $columnName = $columnName_arr[$columnIndex]['data']; // Column name
    $columnSortOrder = $order_arr[0]['dir']; // asc or desc
    $searchValue = $search_arr['value']; // Search value
    $totalRecords = ContactUs::select('contact_us.id', 'create_tickets.status', 'create_tickets.status', 'contact_us.ticket_id', 'contact_us.first_name', 'contact_us.last_name', 'contact_us.email', 'contact_us.mobile', 'contact_us.order_id', 'contact_us.message', 'users.image', 'users.id as userID')
      ->join(
        DB::raw("(SELECT MAX(id) AS max_id FROM contact_us GROUP BY ticket_id) AS cu"),
        function ($join) {
          $join->on('contact_us.id', '=', DB::raw('cu.max_id'));
        }
      )
      ->leftjoin('users', 'users.id', '=', 'contact_us.user_id')
      ->leftjoin('create_tickets', 'create_tickets.id', '=', 'contact_us.ticket_id')->count();
    // $totalRecordswithFilter = ContactUs::select('count(*) as allcount')->count();
    $totalRecordswithFilter = ContactUs::select('contact_us.id', 'create_tickets.status', 'create_tickets.status', 'contact_us.ticket_id', 'contact_us.first_name', 'contact_us.last_name', 'contact_us.email', 'contact_us.mobile', 'contact_us.order_id', 'contact_us.message', 'users.image', 'users.id as userID')
      ->join(
        DB::raw("(SELECT MAX(id) AS max_id FROM contact_us GROUP BY ticket_id) AS cu"),
        function ($join) {
          $join->on('contact_us.id', '=', DB::raw('cu.max_id'));
        }
      )
      ->leftjoin('users', 'users.id', '=', 'contact_us.user_id')
      ->leftjoin('create_tickets', 'create_tickets.id', '=', 'contact_us.ticket_id')->count();
    $records = ContactUs::select('contact_us.id', 'create_tickets.status', 'create_tickets.status', 'contact_us.ticket_id', 'contact_us.first_name', 'contact_us.last_name', 'contact_us.email', 'contact_us.mobile', 'contact_us.order_id', 'contact_us.message', 'users.image', 'users.id as userID')
      ->join(
        DB::raw("(SELECT MAX(id) AS max_id FROM contact_us GROUP BY ticket_id) AS cu"),
        function ($join) {
          $join->on('contact_us.id', '=', DB::raw('cu.max_id'));
        }
      )
      ->leftjoin('users', 'users.id', '=', 'contact_us.user_id')
      ->leftjoin('create_tickets', 'create_tickets.id', '=', 'contact_us.ticket_id')
      ->orderBy($columnName, $columnSortOrder)
      ->skip($start)
      ->take($rowperpage)
      ->get();
    // dd($records);
    $data_arr = array();
    foreach ($records as $record) {
      $data_arr[] = array(
        "id" => $record->id,
        "ticket_id" => $record->ticket_id,
        "user_id" => $record->userID,
        "first_name" => $record->first_name . ' ' . $record->last_name,
        "email" => $record->email,
        "mobile" => $record->mobile,
        "order_id" => $record->order_id,
        "message" => $record->message,
        "status" => $record->status,
        "image" => $record->image,
        "action" => ''
      );
    }
    $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordswithFilter,
      "aaData" => $data_arr
    );

    echo json_encode($response);
    exit;
  }
  public function userReply(Request $request, $id = null)
  {
    if ($request->isMethod('post')) {
      $rules = [
        'message' => 'required',

      ];

      $customMessages = [
        'message.required' => 'Please write message.',
      ];
      $this->validate($request, $rules, $customMessages);
      if ($request->hasfile('image')) {
        $imageName = time() . '.' . $request->image->getClientOriginalName();
        $request->image->move('/assets/images/support_images/', $imageName);
      }
      $user = ContactUs::where('user_id', $id)->first();
      // dd($user);
      $data = [
        'user_id' => $user->user_id,
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'email' => $user->email,
        'mobile' => $user->mobile ?? "",
        'order_id' => $user->order_id,
        'message' => $request->message ?? "",
        'image' => $imageName ?? "",
        'from_user' => 1,
        'ticket_id' => $user->ticket_id,
        'created_at' => $user->created_at,
        'to_user' => $user->user_id,
      ];
      // dd($data);
      ContactUs::create($data);
    }
    $data = ContactUs::select('contact_us.first_name', 'contact_us.ticket_id', 'create_tickets.status', 'contact_us.user_id', 'contact_us.last_name', 'contact_us.email', 'contact_us.mobile', 'contact_us.message', 'users.image')
      ->leftjoin('users', 'users.id', '=', 'contact_us.user_id')
      ->leftjoin('create_tickets', 'create_tickets.id', '=', 'contact_us.ticket_id')
      ->where('users.id', $id)
      ->where('create_tickets.status', 1)
      ->orWhere('contact_us.user_id', $id)
      ->first();
    // dd($data);
    $chat = ContactUs::select('contact_us.message', 'contact_us.from_user', 'create_tickets.id', 'contact_us.ticket_id')
      ->join('create_tickets', 'create_tickets.id', '=', 'contact_us.ticket_id')
      ->where('contact_us.from_user', $id)
      ->orderBy('contact_us.id', 'desc')
      ->limit(1)
      ->get();
    $chatCount = ContactUs::select('contact_us.message', 'contact_us.from_user', 'create_tickets.id', 'contact_us.ticket_id')
      ->join('create_tickets', 'create_tickets.id', '=', 'contact_us.ticket_id')
      ->where('contact_us.from_user', $id)
      ->orderBy('contact_us.id', 'desc')
      ->count();
    $chatAdmin = ContactUs::where('from_user', Auth::guard('admin')->user()->id)->where('to_user', $id)->orderBy('id', 'desc')->limit(1)->get();
    // dd($chatAdmin);
    return view('content.apps.app-email', compact('data', 'chat', 'chatAdmin', 'chatCount'));
  }
  public function closeTicket($id)
  {
    // dd($id);
    CreateTicket::where('user_id', $id)->where('status', 1)->update(['status' => 0]);
    return redirect()->back()->with('message', 'Ticket closed successfully');
  }
  public function chatUser($id)
  {
    $data = ContactUs::select('contact_us.first_name', 'contact_us.ticket_id', 'create_tickets.status', 'contact_us.user_id', 'contact_us.last_name', 'contact_us.email', 'contact_us.mobile', 'contact_us.message', 'users.image')
      ->leftjoin('users', 'users.id', '=', 'contact_us.user_id')
      ->leftjoin('create_tickets', 'create_tickets.id', '=', 'contact_us.ticket_id')
      ->where('users.id', $id)
      ->where('create_tickets.status', 1)
      ->orWhere('contact_us.user_id', $id)
      ->first();
    // dd($data);
    $chat = ContactUs::where('from_user', $id)->orderBy('id', 'desc')->get();
    $chatAdmin = ContactUs::where('from_user', Auth::guard('admin')->user()->id)->where('to_user', $id)->get();
    return view('content.apps.app-email', compact('data', 'chat', 'chatAdmin'));
  }
}
