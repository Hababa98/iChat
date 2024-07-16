<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class EcommerceProductCategory extends Controller
{
  public function index()
  {
    return view('content.apps.app-ecommerce-category-list');
  }
  public function getCategoryListData(Request $request)
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
    $totalRecords = Category::select('count(*) as allcount')->count();
    $totalRecordswithFilter = Category::select('count(*) as allcount')->where('category_name', 'like', '%' . $searchValue . '%')->count();
    $records = Category::orderBy($columnName, $columnSortOrder)
      ->where('categories.category_name', 'like', '%' . $searchValue . '%')
      ->skip($start)
      ->take($rowperpage)
      ->get();
    $data_arr = array();
    foreach ($records as $record) {
      $data_arr[] = array(
        "id" => $record->id,
        "category_name" => $record->category_name,
        "status" => $record->status,
        "category_image" => $record->category_image,
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
  public function add(Request $request)
  {
    $rules = [
      'category_name' => 'required',
      'category_image' => 'required',
      'status' => 'required',

    ];

    $customMessages = [
      'category_name.required' => 'Please enter category name.',
      'status.required' => 'Please select status.'
    ];
    $this->validate($request, $rules, $customMessages);

    if ($request->hasfile('category_image')) {

      $imageName = time() . '.' . $request->category_image->extension();
      $request->category_image->move('/assets/images/category_images/', $imageName);
    }
    $data = new Category();
    $data->category_name = $request->category_name;
    $data->status = $request->status;
    $data->category_icon = "";
    $data->category_image = $imageName;
    $data->save();
    return redirect()->route('app-ecommerce-product-category');
  }

  public function edit($id)
  {
    $data = Category::find($id);
    return view('content.apps.app-ecommerce-category-edit', compact('data'));
  }
  public function update($id, Request $request)
  {
    // dd($request->all());
    $rules = [
      'category_name' => 'required',
      'status' => 'required',

    ];

    $customMessages = [
      'category_name.required' => 'Please enter category name.',
      'status.required' => 'Please select status.'
    ];
    $this->validate($request, $rules, $customMessages);

    if ($request->hasfile('category_image')) {
      $data = Category::find($id);
      if ($data->category_image) {
        $image_path = public_path('/assets/images/category_images/' . $data->category_image);
        if (file_exists($image_path)) {
          unlink($image_path);
        }
      }
      $imageName = time() . '.' . $request->category_image->extension();
      $request->category_image->move('/assets/images/category_images/', $imageName);
    }
    $data = Category::find($id);
    $data->category_name = $request->category_name;
    $data->status = $request->status;
    $data->category_image = $imageName ?? $data->category_image;
    $data->save();
    return redirect()->route('app-ecommerce-product-category')->with('message', 'Category updated successfully');
  }
  public function delete($id)
  {
    $data = Category::find($id);
    if ($data->category_image) {
      $image_path = public_path('/assets/images/category_images/' . $data->category_image);
      if (file_exists($image_path)) {
        unlink($image_path);
      }
    }
    $data->delete();
    return redirect()->back()->with('message', 'Category deleted successfully');
  }
}
