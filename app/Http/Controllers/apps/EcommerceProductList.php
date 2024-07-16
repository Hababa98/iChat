<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EcommerceProductList extends Controller
{
  public function index()
  {
    return view('content.apps.app-ecommerce-product-list');
  }
  public function productListData(Request $request)
  {
    $draw = $request->get('draw');
    $start = $request->get("start");
    $rowperpage = $request->get("length"); // Rows display per page

    $columnIndex_arr = $request->get('order');
    $columnName_arr = $request->get('columns');
    $order_arr = $request->get('order');
    $search_arr = $request->get('search');
    // dd($columnIndex_arr);
    $columnIndex = $columnIndex_arr[0]['column']; // Column index
    $columnName = $columnName_arr[$columnIndex]['data']; // Column name
    $columnSortOrder = $order_arr[0]['dir']; // asc or desc
    $searchValue = $search_arr['value']; // Search value
    $totalRecords = Product::with('productImages')->leftjoin('categories', 'category_id', '=', 'categories.id')->select('count(*) as allcount')->count();
    $totalRecordswithFilter = Product::with('productImages')->leftjoin('categories', 'category_id', '=', 'categories.id')->select('count(*) as allcount')->where('product_name', 'like', '%' . $searchValue . '%')->count();
    $totalRecords = Product::with('productImages')->leftjoin('categories', 'category_id', '=', 'categories.id')->select('count(*) as allcount')->count();
    // dd($totalRecordswithFilter);
    // Fetch records
    $records = Product::with('productImages')
      ->orderBy($columnName, $columnSortOrder)
      ->where('products.product_name', 'like', '%' . $searchValue . '%')
      ->skip($start)
      ->take($rowperpage)
      ->get()->transform(function ($tsr) {
        $tsr->category_name = Category::select('categories.category_name')->where('id', $tsr->category_id)->first()->category_name ?? "";
        return $tsr;
      });
    // echo "<pre>";
    // print_r($records->toArray());
    // die;
    $data_arr = array();
    // $imgData = array();
    // dd($records);
    foreach ($records as $record) {
      $imgData = array();
      foreach ($record->productImages as $value) {
        $imgData[] = array(
          'product_image' => $value->product_image ?? ""
        );
      }
      $data_arr[] = array(
        "id" => $record->id,
        "product_name" => $record->product_name,
        "created_at" => Carbon::parse($record->created_at)->format('j M, Y'),
        "product_image" => $imgData,
        "product_about" => $record->product_about,
        "product_quantity" => $record->product_quantity,
        "category_name" => ucfirst($record->category_name),
        "product_price" => $record->product_price,
        "product_sale_price" => $record->product_sale_price,
        "status" => $record->status,
        "action" => ''
      );
    }
    // die;
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
  public function show($id)
  {
    $data = Product::with('productImages')->find($id);
    $category = Category::all();
    $subcategory = SubCategory::all();
    // $productColor = explode(',', $data->product_color);
    // $productSize = explode(',', $data->product_size);
    return view('content.apps.app-ecommerce-product-show', compact('category', 'data', 'subcategory'));
  }
}

// $product = Product::orderBy('id', 'desc')->get();
// // dd($product);
// return response()->json($product);