<?php

namespace App\Http\Controllers;

use App\Models\CountryCurrencies;
use App\Models\CountryDetail;
use App\Models\Currencies;
use Illuminate\Http\Request;

class CountryCurrenciesController extends Controller
{
  public function index()
  {
    return view('content.apps.app-ecommerce-currecy-country-list');
  }
  public function getCurrencyList(Request $request)
  {
    $draw = $request->get('draw');
    $start = $request->get("start");
    $rowPerPage = $request->get("length");
    $columnIndex_arr = $request->get('order');
    $columnName_arr = $request->get('columns');
    $order_arr = $request->get('order');
    $search_arr = $request->get('search');
    $columnIndex = $columnIndex_arr[0]['column'];
    $columnName = $columnName_arr[$columnIndex]['data'];
    $columnSortOrder = $order_arr[0]['dir'];
    $searchValue = $search_arr['value'];
    $totalRecords = CountryCurrencies::with('country', 'currency', 'code')->count();
    $totalRecordswithFilter = CountryCurrencies::with('country', 'currency', 'code')
      ->whereHas('country', function ($query) use ($searchValue) {
        $query->where('name', 'like', '%' . $searchValue . '%');
      })
      ->orWhereHas('currency', function ($query) use ($searchValue) {
        $query->where('currency_name', 'like', '%' . $searchValue . '%');
      })
      ->orWhereHas('code', function ($query) use ($searchValue) {
        $query->where('currency', 'like', '%' . $searchValue . '%');
      })
      ->orWhereHas('symbol', function ($query) use ($searchValue) {
        $query->where('currency_symbol', 'like', '%' . $searchValue . '%');
      })
      ->count();

    $records = CountryCurrencies::with('country', 'currency', 'code')
      ->whereHas('country', function ($query) use ($searchValue) {
        $query->where('name', 'like', '%' . $searchValue . '%');
      })
      ->orWhereHas('currency', function ($query) use ($searchValue) {
        $query->where('currency_name', 'like', '%' . $searchValue . '%');
      })
      ->orWhereHas('code', function ($query) use ($searchValue) {
        $query->where('currency', 'like', '%' . $searchValue . '%');
      })
      ->orWhereHas('symbol', function ($query) use ($searchValue) {
        $query->where('currency_symbol', 'like', '%' . $searchValue . '%');
      })
      ->orderBy($columnName, $columnSortOrder)
      ->skip($start)
      ->take($rowPerPage)
      ->get();

    $data_arr = array();
    foreach ($records as $record) {
      $data_arr[] = array(
        "id" => $record->id,
        "country" => $record->country->name ?? "",
        "currency" => $record->currency->currency_name ?? "",
        "code" => $record->code->currency ?? "",
        "symbol" => $record->symbol->currency_symbol ?? "",
        "status" => $record->status,
        "action" => '',
      );
    }
    // dd($data_arr);
    $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordswithFilter,
      "aaData" => $data_arr,
    );

    echo json_encode($response);
    exit;
  }
  public function addCurrency()
  {
    $data = CountryDetail::get();
    // dd($data->toArray());
    return view('content.apps.app-add-currencies', compact('data'));
  }
  public function storeCurrency(Request $request)
  {
    // dd($request->all());
    $rules = [
      'country_id' => 'required',
      'currency_id' => 'required',
      'code_id' => 'required',
      'status' => 'required',

    ];

    $customMessages = [
      'country_id.required' => 'Please select country.',
      'currency_id.required' => 'Please select currency.',
      'code_id.required' => 'Please select code.',
      'status.required' => 'Please select status.',
    ];
    $this->validate($request, $rules, $customMessages);
    $data = new CountryCurrencies();
    $data->country_id = $request->country_id;
    $data->currency_id = $request->currency_id;
    $data->code_id = $request->code_id;
    $data->symbol_id = $request->symbol_id;
    $data->status = $request->status ? 1 : 0;
    $data->save();
    return redirect()->route('app-currencies-list')->with('message', 'Currency added successfully');
  }
  public function getCurrency(Request $request)
  {
    $currency = CountryDetail::find($request->country_id);
    // dd($currency);
    return response()->json($currency);
  }
  public function changeCurrencyStatus($id, Request $request)
  {
    $changeStatus = 0;
    $statusCount = CountryCurrencies::where('status', 1)->count();

    if ($request->status == 1) {
      $status = 0;
      $statusCount = CountryCurrencies::where('status', 1)->count();
      if ($statusCount > 1) {
        $data = CountryCurrencies::where('id', $id)->update(['status' => $status]);
        return response()->json(['message' => 'Status changed successfully', 'data' => $data]);
      } else {
        return response()->json(['status' => $changeStatus]);
      }
    } else {
      $status = 1;
      $data = CountryCurrencies::where('id', $id)->update(['status' => $status]);
      $currencyData = CountryCurrencies::where('id', $id)->first();
      return response()->json(['message' => 'Status changed successfully', 'data' => $data, 'currencyData' => $currencyData]);
    }
  }
  public function deleteCurrency($id)
  {
    $data = CountryCurrencies::where('id', $id)->delete();
    return response()->json(['message' => 'Currency deleted successfully']);
  }
  public function editCurrency($id)
  {
    $data = CountryDetail::get();
    $currency = CountryCurrencies::with('country', 'currency', 'code')->find($id);
    return view('content.apps.app-edit-currencies', compact('data', 'currency'));
  }
  public function updateCurrency($id, Request $request)
  {
    // dd($request->all(), $id);
    $rules = [
      'country_id' => 'required',
      'currency_id' => 'required',
      'code_id' => 'required',
      'status' => 'required',

    ];

    $customMessages = [
      'country_id.required' => 'Please select country.',
      'currency_id.required' => 'Please select currency.',
      'code_id.required' => 'Please select code.',
      'status.required' => 'Please select status.',
    ];
    $this->validate($request, $rules, $customMessages);
    $data = CountryCurrencies::find($id);
    $data->country_id = $request->country_id;
    $data->currency_id = $request->currency_id;
    $data->code_id = $request->code_id;
    $data->symbol_id = $request->symbol_id;
    $data->status = $request->status ? 1 : 0;
    $data->save();
    return redirect()->route('app-currencies-list')->with('message', 'Currency updated successfully');
  }
}
