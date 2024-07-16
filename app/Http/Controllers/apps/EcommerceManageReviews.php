<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class EcommerceManageReviews extends Controller
{
  public function index()
  {
    return view('content.apps.app-ecommerce-manage-reviews');
  }
  public function getReviewList(Request $request)
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
    $totalRecords = ProductReview::select('count(*) as allcount')->count();
    $totalRecordswithFilter = ProductReview::select('count(*) as allcount')->count();
    // dd($columnName, $columnSortOrder);
    $records = ProductReview::with('productImages')
      ->select('products.id as productID', 'products.product_name', 'products.product_about', 'product_reviews.id', 'product_reviews.product_id', 'product_reviews.review_star', 'product_reviews.review_message', 'product_reviews.user_id', 'users.first_name', 'users.id as user_id', 'users.last_name', 'users.email', 'users.mobile', 'users.image', 'product_reviews.created_at')
      ->orderBy($columnName, $columnSortOrder)
      ->leftjoin('products', 'products.id', '=', 'product_reviews.product_id')
      ->leftjoin('users', 'users.id', '=', 'product_reviews.user_id')
      ->skip($start)
      ->take($rowperpage)
      ->get();
    $data_arr = array();
    foreach ($records as $record) {
      $imgData = array();
      foreach ($record->productImages as $value) {
        $imgData[] = array(
          'product_image' => $value->product_image
        );
      }
      $data_arr[] = array(
        "id" => $record->id,
        "product_name" => $record->product_name,
        "product_about" => $record->product_about,
        "product_image" => $imgData,
        "review_star" => $record->review_star,
        "review_message" => $record->review_message,
        "first_name" => $record->first_name . ' ' . $record->last_name,
        "email" => $record->email,
        "user_id" => $record->user_id,
        "mobile" => $record->mobile,
        "user_image" => $record->image,
        "created_at" => $record->created_at,
        "action" => ''
      );
    }
    // dd($data_arr);
    $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordswithFilter,
      "aaData" => $data_arr
    );

    echo json_encode($response);
    exit;
  }
  public function reviewDelete($id)
  {
    // dd($id);
    $data = ProductReview::where('id', $id)->delete();
    return response()->json(['message' => 'Review deleted successfully']);
  }
}
