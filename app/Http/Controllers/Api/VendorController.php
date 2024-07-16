<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\VendorStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
  public function vendorRegister(Request $request)
  {
    $rules = [
      'name' => 'required',
      'email' => 'required|email|unique:vendors',
      'password' => 'required|min:6',
    ];
    $customMessages = [
      'name.required' => 'Please enter your name.',
      'email.required' => 'Please enter your email.',
      'email.unique' => 'This email is already taken.',
      'password.required' => 'Please enter your password.',
    ];
    $validator = Validator::make($request->all(), $rules, $customMessages);
    if ($validator->fails()) {
      $errors = $validator->errors();

      $responseErrors = [];
      foreach ($errors->all() as $error) {
        $responseErrors = $error;
      }

      return response([
        'success' => false,
        'email' => $request->email ?? "",
        'message' => $responseErrors,
      ], 422);
    }

    $input = $request->all();
    if (Vendor::where('email', $input['email'])->exists()) {
      return response([
        'email' => (string) $request->email,
        'message' => 'Email Already Register..!',
      ]);
    }
    $input['password'] = bcrypt($input['password']);
    $vendor = Vendor::create($input);
    $success['token'] =  $vendor->createToken('vendorApp')->accessToken;
    $success['name'] =  $vendor->name;
    return response([
      'email' => (string) $request->email,
      'message' => 'Vender registered successfully..!',
    ]);
  }
  public function vendorLogin(Request $request)
  {
    $rules = [
      'email' => 'required|exists:vendors',
      'password' => 'required',
    ];
    $customMessages = [
      'email.required' => 'Please enter your email.',
      'email.unique' => 'This email is not exists.',
      'password.required' => 'Please enter your password.',
    ];
    $validator = Validator::make($request->all(), $rules, $customMessages);
    if ($validator->fails()) {
      $errors = $validator->errors();

      $responseErrors = [];
      foreach ($errors->all() as $error) {
        $responseErrors = $error;
      }

      return response([
        'success' => false,
        'email' => $request->email ?? "",
        'message' => $responseErrors,
      ], 422);
    }


    if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password])) {
      $authVendor = Auth::guard('vendor')->user();
      $token = $authVendor->createToken('vendorApp')->plainTextToken;

      return response([
        'success' => true,
        'user_id' => $authVendor->id,
        'email' => $authVendor->email,
        'token' => $token,
        'message' => 'Vendor signed in..!',
      ]);
    } else {
      // Authentication failed
      return response([
        'success' => false,
        'message' => 'Invalid credentials',
      ], 401);
    }
  }
  public function addProduct(Request $request)
  {
    $vendor_id = Auth::guard('sanctum')->user()->id;
    $rules = [
      'product_name' => 'required',
      'product_description' => 'required',
      'product_price' => 'required',
      'product_sale_price' => 'sometimes|nullable|lt:product_price',
      'category_id' => 'required',
      'sub_category_id' => 'required',
      'status' => 'required',

    ];

    $customMessages = [
      'product_name.required' => 'Please enter product name.',
      'product_description.required' => 'Please enter product description.',
      'product_images.required' => 'Please select product image.',
      'product_price.required' => 'Please enter product price.',
      'product_sale_price.numeric' => 'Please enter product sale price.',
      'product_sale_price.lt' => 'The sale price must be less than the main price.',
      'category_id.required' => 'Please select category.',
      'sub_category_id.required' => 'Please select sub category.',
      'status.required' => 'Please select status.',
    ];
    $validator = Validator::make($request->all(), $rules, $customMessages);
    if ($validator->fails()) {
      $errors = $validator->errors();

      $responseErrors = [];
      foreach ($errors->all() as $error) {
        $responseErrors = $error;
      }

      return response([
        'success' => false,
        'message' => $responseErrors,
      ], 422);
    }

    $data = new Product();
    $data->vendor_id = $vendor_id;
    $data->product_name = $request->product_name;
    $data->product_about = $request->product_description;
    $data->product_price = $request->product_price;
    $data->product_sale_price = $request->product_sale_price ?? 0;
    $data->category_id = $request->category_id;
    $data->product_color = $request->product_color ?? "";
    $data->product_size = $request->product_size ?? "";
    $data->sub_category_id = $request->sub_category_id;
    $data->status = $request->status;
    $data->save();
    if ($request->hasfile('product_images')) {
      foreach ($request->file('product_images') as $file) {
        $fileName = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path() . '/assets/images/product_images/', $fileName);
        $data->productImages()->create([
          'product_id' => $data->id,
          'product_image' => $fileName
        ]);
      }
    }
    return response([
      'success' => true,
      'message' => 'Product added successfully...!',
    ], 200);
  }
  public function addStore(Request $request)
  {
    $vendor_id = Auth::guard('sanctum')->user()->id;
    $rules = [
      'store_name' => 'required',
      'business_email' => 'required',
      'business_email' => 'required|email|unique:vendor_stores',
      'mobile' => 'required',
      'vat_gstin_no' => 'required',
      'store_address' => 'required',
      'store_images' => 'required',

    ];

    $customMessages = [
      'store_name.required' => 'Please enter store name.',
      'business_email.required' => 'Please enter business email.',
      'business_email.unique' => 'This email is already taken.',
      'mobile.required' => 'Please enter mobile.',
      'vat_gstin_no.required' => 'Please enter vat gstin no.',
      'store_address.required' => 'Please enter store address.',
      'store_images.required' => 'Please select store image.',
    ];
    $validator = Validator::make($request->all(), $rules, $customMessages);
    if ($validator->fails()) {
      $errors = $validator->errors();

      $responseErrors = [];
      foreach ($errors->all() as $error) {
        $responseErrors = $error;
      }

      return response([
        'success' => false,
        'message' => $responseErrors,
      ], 422);
    }
    if ($request->hasfile('store_logo')) {
      $storeLogo = time() . '.' . $request->store_logo->getClientOriginalName();
      $request->store_logo->move(public_path() . '/assets/images/store_logo/', $storeLogo);
    }
    $data = new VendorStore();
    $data->vendor_id = $vendor_id;
    $data->store_name = $request->store_name;
    $data->business_email = $request->business_email;
    $data->country_code = $request->country_code;
    $data->mobile = $request->mobile;
    $data->vat_gstin_no = $request->vat_gstin_no;
    $data->store_address = $request->store_address;
    $data->store_logo = $storeLogo;
    $data->save();
    if ($request->hasfile('store_images')) {
      foreach ($request->file('store_images') as $file) {
        $fileName = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path() . '/assets/images/store_images/', $fileName);
        $data->storeImages()->create([
          'store_id' => $data->id,
          'store_images' => $fileName
        ]);
      }
    }
    return response([
      'success' => true,
      'message' => 'Store added successfully...!',
    ], 200);
  }
  public function getStore()
  {
    $vendor_id = Auth::guard('sanctum')->user()->id;
    $data = VendorStore::with('storeImages')->where('vendor_id', $vendor_id)->get();
    $vendoreStore = [];
    foreach ($data as $value) {
      $storeImg = [];
      foreach ($value->storeImages as $img) {
        $storeImg[] = $img->store_images ? url('assets/images/store_images/' . $img->store_images) : '';
      }
      $vendoreStore[] = [
        'id' => $value->id,
        'vendor_id' => $value->vendor_id,
        'store_name' => $value->store_name,
        'business_email' => $value->business_email,
        'country_code' => $value->country_code,
        'store_address' => $value->store_address,
        'store_logo' => $value->store_logo ? url('assets/images/store_logo/' . $value->store_logo) : '',
        'store_images' => $storeImg,
      ];
    }
    return response([
      'success' => true,
      'data' => $vendoreStore,
    ], 200);
  }
}
