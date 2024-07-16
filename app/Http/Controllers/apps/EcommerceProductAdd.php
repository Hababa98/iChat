<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductMedia;
use App\Models\Shipping;
use App\Models\SubCategory;
use App\Models\Variant;
use App\Models\Vendor;
use Illuminate\Http\Request;

class EcommerceProductAdd extends Controller
{
  public function index()
  {
    $category = Category::all();
    $subcategory = SubCategory::all();
    $productImage = ProductMedia::all();
    $variant = Variant::get();
    $vendor = Vendor::get();
    $shipping = Shipping::get();
    // dd($shipping);
    return view('content.apps.app-ecommerce-product-add', compact('category', 'subcategory', 'productImage', 'variant', 'vendor', 'shipping'));
  }
  public function store(Request $request)
  {
    // dd($request->all());
    $sizeProduct = '';
    $colorProduct = '';
    if ($request->variant_data) {
      foreach ($request->variant_data as $value) {
        if (isset($value['size'])) {
          $sizeProduct = $value['size'];
        }
      }
      foreach ($request->variant_data as $value) {
        if (isset($value['color'])) {
          $colorProduct = $value['color'];
        }
      }
    }
    $rules = [
      'product_name' => 'required',
      'product_description' => 'required',
      // 'product_images' => 'required',
      'product_price' => 'required',
      'product_sale_price' => 'sometimes|nullable|lt:product_price',
      'category_id' => 'required',
      'sub_category_id' => 'required',
      'status' => 'required',

    ];

    $customMessages = [
      'product_name.required' => 'Please enter product name.',
      'product_description.required' => 'Please enter product description.',
      // 'product_images.required' => 'Please select product image.',
      'product_price.required' => 'Please enter product price.',
      'product_sale_price.numeric' => 'Please enter product sale price.',
      'product_sale_price.lt' => 'The sale price must be less than the main price.',
      'category_id.required' => 'Please select category.',
      'sub_category_id.required' => 'Please select sub category.',
      'status.required' => 'Please select status.',
    ];
    $this->validate($request, $rules, $customMessages);
    // if ($request->product_color) {
    //   $productColorArray = json_decode($request->product_color);
    //   $values = [];
    //   // dd($request->product_color);
    //   foreach ($productColorArray as $item) {
    //     $values[] = $item->value;
    //   }
    //   $productColor = implode(',', $values);
    // }
    // if ($request->product_size) {
    //   $productSizeArray = json_decode($request->product_size);
    //   $values = [];
    //   foreach ($productSizeArray as $item) {
    //     $values[] = $item->value;
    //   }
    //   $productSize = implode(',', $values);
    // }

    $data = new Product();
    $data->product_name = $request->product_name;
    $data->product_sku = $request->product_sku;
    $data->product_about = $request->product_description;
    $data->key_features = $request->key_features;
    $data->product_quantity = $request->quantity;
    $data->product_price = $request->product_price;
    $data->product_sale_price = $request->product_sale_price ?? 0;
    $data->category_id = $request->category_id;
    $data->product_color = $colorProduct ?? "";
    $data->product_size = $sizeProduct ?? "";
    $data->sub_category_id = $request->sub_category_id;
    $data->shipping_id = $request->shipping_id;
    $data->vendor_id = $request->vendor_id;
    $data->status = $request->status ? 1 : 0;
    $data->in_stock = $request->in_stock ? 1 : 0;
    $data->save();
    if ($request->hasfile('product_images')) {
      foreach ($request->file('product_images') as $file) {
        $fileName = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path() . '/assets/images/product_images/', $fileName);
        // $request->category_image->move(public_path() . '/assets/images/category_images/', $imageName);

        $data->productImages()->create([
          'product_id' => $data->id,
          'product_image' => $fileName
        ]);
        $productMedia = new ProductMedia();
        $productMedia->product_media_image = $fileName;
        $productMedia->save();
      }
    } else {
      foreach ($request->product_images as $product_img_name) {
        $data->productImages()->create([
          'product_id' => $data->id,
          'product_image' => $product_img_name
        ]);
        $productMedia = new ProductMedia();
        $productMedia->product_media_image = $product_img_name;
        $productMedia->save();
      }
    }



    return redirect()->route('app-ecommerce-product-list')->with('message', 'Product added successfully');;
  }
  public function edit($id)
  {
    $data = Product::with('productImages')->find($id);
    $category = Category::all();
    $subcategory = SubCategory::all();
    return view('content.apps.app-ecommerce-product-edit', compact('category', 'data', 'subcategory'));
  }
  public function update($id, Request $request)
  {
    $rules = [
      'product_name' => 'required',
      'product_description' => 'required',
      'product_price' => 'required',
      'product_sale_price' => 'required|numeric|lt:product_price',
      'category_id' => 'required',
      'sub_category_id' => 'required',
      'status' => 'required',

    ];

    $customMessages = [
      'product_name.required' => 'Please enter product name.',
      'product_description.required' => 'Please enter product description.',
      'product_price.required' => 'Please enter product price.',
      'product_sale_price.required' => 'Please enter product sale price.',
      'product_sale_price.lt' => 'The sale price must be less than the main price.',
      'category_id.required' => 'Please select category.',
      'sub_category_id.required' => 'Please select sub category.',
      'status.required' => 'Please select status.',
    ];
    if ($request->product_color) {
      $productColorArray = json_decode($request->product_color);
      $values = [];
      foreach ($productColorArray as $item) {
        $values[] = $item->value;
      }
      $productColor = implode(',', $values);
    }
    if ($request->product_size) {
      $productSizeArray = json_decode($request->product_size);
      $values = [];
      foreach ($productSizeArray as $item) {
        $values[] = $item->value;
      }
      $productSize = implode(',', $values);
    }
    $this->validate($request, $rules, $customMessages);
    $data = Product::find($id);
    $data->product_name = $request->product_name;
    $data->product_about = $request->product_description;
    $data->product_price = $request->product_price;
    $data->product_sale_price = $request->product_sale_price;
    $data->category_id = $request->category_id;
    $data->sub_category_id = $request->sub_category_id;
    $data->status = $request->status;
    $data->product_color = $productColor ?? "";
    $data->product_size = $productSize ?? "";
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
    return redirect()->route('app-ecommerce-product-list')->with('message', 'Product updated successfully');;
  }
  public function productImageDelete($id)
  {
    $data = ProductImages::find($id);
    $image_path = public_path('/assets/images/product_images/' . $data->product_image);
    if (file_exists($image_path)) {
      unlink($image_path);
    }
    $data->delete();
    return response()->json(['success' => 'sucess']);
  }

  public function delete($id)
  {
    $data = Product::where('id', $id)->delete();
    return redirect()->back()->with('message', 'Product deleted successfully');
  }
}
