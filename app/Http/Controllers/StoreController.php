<?php

namespace App\Http\Controllers;

use App\Models\StoreImages;
use App\Models\VendorStore;
use Illuminate\Http\Request;

class StoreController extends Controller
{
  public function index()
  {
    $data = VendorStore::with('storeImages')->get();
    return view('content.apps.app-ecommerce-store-list', compact('data'));
  }
  public function storeListData(Request $request)
  {
    $draw = $request->get('draw');
    $start = $request->get("start");
    $rowperpage = $request->get("length");
    $columnIndex_arr = $request->get('order');
    $columnName_arr = $request->get('columns');
    $order_arr = $request->get('order');
    $search_arr = $request->get('search');
    $columnIndex = $columnIndex_arr[0]['column'];
    $columnName = $columnName_arr[$columnIndex]['data'];
    $columnSortOrder = $order_arr[0]['dir'];
    $searchValue = $search_arr['value'];
    $totalRecords = VendorStore::select('count(*) as allcount')->where('vendor_request', 1)->count();
    $totalRecordswithFilter = VendorStore::select('count(*) as allcount')->where('vendor_request', 1)->count();
    $records = VendorStore::with('vendorDetail')->orderBy($columnName, $columnSortOrder)
      ->whereHas('vendorDetail', function ($query) use ($searchValue) {
        $query->where('name', 'like', '%' . $searchValue . '%');
      })
      ->where('vendor_request', 1)
      ->where('business_email', 'like', '%' . $searchValue . '%')
      ->where('store_name', 'like', '%' . $searchValue . '%')
      ->where('mobile', 'like', '%' . $searchValue . '%')
      ->skip($start)
      ->take($rowperpage)
      ->get();
    // dd($records);
    $data_arr = array();


    foreach ($records as $record) {
      $data_arr[] = array(
        "id" => $record->id,
        "store_name" => $record->store_name,
        "vendor_id" => $record->vendorDetail->name,
        "email" => $record->business_email,
        "mobile" => $record->mobile,
        "store_address" => $record->store_address,
        "store_logo" => $record->store_logo,
        "status" => $record->status,
        "vendor_request" => $record->vendor_request,
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
  public function storeRequestList()
  {
    $data = VendorStore::get();
    return view('content.apps.app-ecommerce-store-request-list', compact('data'));
  }
  public function storeRequestListData(Request $request)
  {
    $draw = $request->get('draw');
    $start = $request->get("start");
    $rowperpage = $request->get("length");
    $columnIndex_arr = $request->get('order');
    $columnName_arr = $request->get('columns');
    $order_arr = $request->get('order');
    $search_arr = $request->get('search');
    $columnIndex = $columnIndex_arr[0]['column'];
    $columnName = $columnName_arr[$columnIndex]['data'];
    $columnSortOrder = $order_arr[0]['dir'];
    $searchValue = $search_arr['value'];
    $totalRecords = VendorStore::select('count(*) as allcount')->where('vendor_request', 0)->count();
    $totalRecordswithFilter = VendorStore::select('count(*) as allcount')->where('vendor_request', 0)->count();
    // dd($totalRecordswithFilter);
    $records = VendorStore::with('vendorDetail')->orderBy($columnName, $columnSortOrder)
      ->where('vendor_request', 0)
      // ->where('status', 0)
      // ->where('orders.order_id', 'like', '%' . $searchValue . '%')

      // "created_at" => Carbon::parse($record->created_at)->format('j M Y, H:i'),
      ->skip($start)
      ->take($rowperpage)
      ->get();
    // dd($records);
    $data_arr = array();


    foreach ($records as $record) {
      $data_arr[] = array(
        "id" => $record->id,
        "store_name" => $record->store_name,
        "vendor_id" => $record->vendorDetail->name,
        "email" => $record->business_email,
        "mobile" => $record->mobile,
        "store_address" => $record->store_address,
        "store_logo" => $record->store_logo,
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
  public function storeRequestAccepted($id)
  {
    $data = VendorStore::where('id', $id)->update(['vendor_request' => 1]);
    return response()->json(['message' => 'Request accepted successfully', 'id' => $id]);
  }

  public function changeRequestStatus($id, Request $request)
  {
    if ($request->status == 1) {
      $status = 0;
      $data = VendorStore::where('id', $id)->update(['status' => $status]);
      return response()->json(['message' => 'Status changed successfully', 'data' => $data]);
    } else {
      $status = 1;
      $data = VendorStore::where('id', $id)->update(['status' => $status]);
      return response()->json(['message' => 'Status changed successfully', 'data' => $data]);
    }
  }
  public function storeDelete($id, Request $request)
  {

    $datas = StoreImages::where('store_id', $id)->delete();
    $data = VendorStore::find($id)->delete();
    return response()->json(['message' => 'Store deleted successfully', 'id' => $id]);
  }
}
