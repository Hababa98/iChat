@extends('layouts/layoutMaster')



@section('title', 'eCommerce Add Product - Apps')



@section('vendor-style')

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/quill/katex.css') }}" />

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/quill/editor.css') }}" />

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/select2/select2.css') }}" />

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/dropzone/dropzone.css') }}" />

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/flatpickr/flatpickr.css') }}" />

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/tagify/tagify.css') }}" />

@endsection



@section('vendor-script')

    <script src="{{ asset('public/assets/vendor/libs/quill/katex.js') }}"></script>

    <script src="{{ asset('public/assets/vendor/libs/quill/quill.js') }}"></script>

    <script src="{{ asset('public/assets/vendor/libs/select2/select2.js') }}"></script>

    <script src="{{ asset('public/assets/vendor/libs/dropzone/dropzone.js') }}"></script>

    <script src="{{ asset('public/assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>

    <script src="{{ asset('public/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

    <script src="{{ asset('public/assets/vendor/libs/tagify/tagify.js') }}"></script>

@endsection



@section('page-script')

    <script src="{{ asset('/assets/js/app-ecommerce-product-add.js') }}"></script>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



@section('content')

    <h4 class="py-3 mb-4">

        <span class="text-muted fw-light">eCommerce /</span><span> Edit Product</span>

    </h4>

    <form action="{{ url('app/ecommerce/product/update', $data->id) }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="app-ecommerce">

            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">



                <div class="d-flex flex-column justify-content-center">

                    <h4 class="mb-1 mt-3">Edit Product</h4>

                    <p class="text-muted">Orders placed across your store</p>

                </div>

                <div class="d-flex align-content-center flex-wrap gap-3">

                    <button type="submit" class="btn btn-primary">Publish product</button>

                </div>



            </div>



            <div class="row">

                <div class="col-12 col-lg-8">

                    <div class="card mb-4">

                        <div class="card-header">

                            <h5 class="card-tile mb-0">Product information</h5>

                        </div>

                        <div class="card-body">

                            <div class="mb-3">

                                <label class="form-label" for="ecommerce-product-name">Name</label>

                                <input type="text" class="form-control" id="product_name"
                                    placeholder="Product title"name="product_name" aria-label="Product title"
                                    value="{{ $data->product_name }}">

                                <span class="error">{{ $errors->first('product_name') }}</span>

                            </div>

                            <div>

                                <label class="form-label">Description <span class="text-muted">(Optional)</span></label>

                                <textarea name="product_description" class="form-control" id="product_description" cols="30" rows="10">{{ $data->product_about }}</textarea>

                                <span class="error">{{ $errors->first('product_description') }}</span>

                            </div>

                        </div>

                    </div>

                    <div class="card mb-4">

                        <div class="card-body">

                            @csrf

                            <input type="file" name="product_images[]" class="form-control" multiple id="imageUpload"
                                accept="image/*" value="{{ $data->product_name }}">

                            <div id="imagePreview" class="mb-4 border">

                                @if ($data->productImages)

                                    <div class="row">

                                        @foreach ($data->productImages as $value)
                                            <div class="col-md-2" id="image-preview_{{ $value->id }}">
                                                <img src="{{ asset('/assets/images/product_images/' . $value->product_image) }}"
                                                    style="width: 150px; height:150px;" class="me-4 border">
                                                <a href="javascript:void(0)" class="delete_product_image"
                                                    onclick="return deleteImage({{ $value->id }}, this);">Remove</a>
                                            </div>
                                        @endforeach

                                    </div>

                                @endif

                            </div>

                            <span class="error">{{ $errors->first('product_images') }}</span>

                            {{-- <button type="submit">Upload</button> --}}

                        </div>

                    </div>

                    <!-- /Variants -->

                    <!-- Inventory -->

                    {{-- <div class="card mb-4">

                    <div class="card-header">

                        <h5 class="card-title mb-0">Inventory</h5>

                    </div>

                    <div class="card-body">

                        <div class="row">

                            <!-- Navigation -->

                            <div class="col-12 col-md-4 mx-auto card-separator">

                                <div class="d-flex justify-content-between flex-column mb-3 mb-md-0 pe-md-3">

                                    <ul class="nav nav-align-left nav-pills flex-column">

                                        <li class="nav-item">

                                            <button class="nav-link active" data-bs-toggle="tab"

                                                data-bs-target="#restock">

                                                <i class="bx bx-cube me-2"></i>

                                                <span class="align-middle">Restock</span>

                                            </button>

                                        </li>

                                        <li class="nav-item">

                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#shipping">

                                                <i class="bx bx-car me-2"></i>

                                                <span class="align-middle">Shipping</span>

                                            </button>

                                        </li>

                                        <li class="nav-item">

                                            <button class="nav-link" data-bs-toggle="tab"

                                                data-bs-target="#global-delivery">

                                                <i class="bx bx-globe me-2"></i>

                                                <span class="align-middle">Global Delivery</span>

                                            </button>

                                        </li>

                                        <li class="nav-item">

                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#attributes">

                                                <i class="bx bx-link me-2"></i>

                                                <span class="align-middle">Attributes</span>

                                            </button>

                                        </li>

                                        <li class="nav-item">

                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#advanced">

                                                <i class="bx bx-lock me-2"></i>

                                                <span class="align-middle">Advanced</span>

                                            </button>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                            <!-- /Navigation -->

                            <!-- Options -->

                            <div class="col-12 col-md-8 pt-4 pt-md-0">

                                <div class="tab-content p-0 pe-md-5 ps-md-3">

                                    <!-- Restock Tab -->

                                    <div class="tab-pane fade show active" id="restock" role="tabpanel">

                                        <h5>Options</h5>

                                        <label class="form-label" for="ecommerce-product-stock">Add to Stock</label>

                                        <div class="row mb-3 g-3">

                                            <div class="col-12 col-sm-9">

                                                <input type="number" class="form-control" id="ecommerce-product-stock"

                                                    placeholder="Quantity" name="quantity" aria-label="Quantity">

                                            </div>

                                            <div class="col-12 col-sm-3">

                                                <button class="btn btn-primary"><i

                                                        class='bx bx-check me-2'></i>Confirm</button>

                                            </div>

                                        </div>

                                        <div>

                                            <h6>Product in stock now: <span class="text-muted">54</span></h6>

                                            <h6>Product in transit: <span class="text-muted">390</span></h6>

                                            <h6>Last time restocked: <span class="text-muted">24th June, 2023</span>

                                            </h6>

                                            <h6>Total stock over lifetime: <span class="text-muted">2430</span></h6>

                                        </div>

                                    </div>

                                    <!-- Shipping Tab -->

                                    <div class="tab-pane fade" id="shipping" role="tabpanel">

                                        <h5 class="mb-4">Shipping Type</h5>

                                        <div>

                                            <div class="form-check mb-3">

                                                <input class="form-check-input" type="radio" name="shippingType"

                                                    id="seller">

                                                <label class="form-check-label" for="seller">

                                                    <span class="mb-1 h6">Fulfilled by Seller</span>

                                                    <small class="text-muted">You'll be responsible for product

                                                        delivery.<br>

                                                        Any damage or delay during shipping may cost you a Damage

                                                        fee.</small>

                                                </label>

                                            </div>

                                            <div class="form-check mb-5">

                                                <input class="form-check-input" type="radio" name="shippingType"

                                                    id="companyName" checked>

                                                <label class="form-check-label" for="companyName">

                                                    <span class="mb-1 h6">Fulfilled by Company name &nbsp;<span

                                                            class="badge rounded-2 badge-warning bg-label-warning fs-tiny py-1">RECOMMENDED</span></span>

                                                    <br><small class="text-muted">Your product, Our responsibility.<br>

                                                        For a measly fee, we will handle the delivery process for

                                                        you.</small>

                                                </label>

                                            </div>

                                            <p class="mb-0">See our <a href="javascript:void(0);">Delivery terms and

                                                    conditions</a> for details</p>

                                        </div>

                                    </div>

                                    <!-- Global Delivery Tab -->

                                    <div class="tab-pane fade" id="global-delivery" role="tabpanel">

                                        <h5 class="mb-4">Global Delivery</h5>

                                        <!-- Worldwide delivery -->

                                        <div class="form-check mb-3">

                                            <input class="form-check-input" type="radio" name="globalDel"

                                                id="worldwide">

                                            <label class="form-check-label" for="worldwide">

                                                <span class="mb-1 h6">Worldwide delivery</span>

                                                <small class="text-muted">Only available with Shipping method:

                                                    <a href="javascript:void(0);">Fulfilled by Company name</a></small>

                                            </label>

                                        </div>

                                        <!-- Global delivery -->

                                        <div class="form-check mb-3">

                                            <input class="form-check-input" type="radio" name="globalDel" checked>

                                            <label class="form-check-label w-75 pe-5" for="country-selected">

                                                <span class="mb-2 h6">Selected Countries</span>

                                                <input type="text" class="form-control"

                                                    placeholder="Type Country name" id="country-selected">

                                            </label>

                                        </div>

                                        <!-- Local delivery -->

                                        <div class="form-check">

                                            <input class="form-check-input" type="radio" name="globalDel"

                                                id="local">

                                            <label class="form-check-label" for="local">

                                                <span class="mb-1 h6">Local delivery</span>

                                                <small class="text-muted">Deliver to your country of residence :

                                                    <a href="javascript:void(0);">Change profile address</a></small>

                                            </label>

                                        </div>

                                    </div>

                                    <!-- Attributes Tab -->

                                    <div class="tab-pane fade" id="attributes" role="tabpanel">

                                        <h5 class="mb-4">Attributes</h5>

                                        <div>

                                            <!-- Fragile Product -->

                                            <div class="form-check mb-3">

                                                <input class="form-check-input" type="checkbox" value="fragile"

                                                    id="fragile">

                                                <label class="form-check-label" for="fragile">

                                                    <span class="mb-0 h6">Fragile Product</span>

                                                </label>

                                            </div>

                                            <!-- Biodegradable -->

                                            <div class="form-check mb-3">

                                                <input class="form-check-input" type="checkbox" value="biodegradable"

                                                    id="biodegradable">

                                                <label class="form-check-label" for="biodegradable">

                                                    <span class="mb-0 h6">Biodegradable</span>

                                                </label>

                                            </div>

                                            <!-- Frozen Product -->

                                            <div class="form-check mb-3">

                                                <input class="form-check-input" type="checkbox" value="frozen" checked>

                                                <label class="form-check-label w-75 pe-5" for="frozen">

                                                    <span class="mb-1 h6">Frozen Product</span>

                                                    <input type="number" class="form-control"

                                                        placeholder="Max. allowed Temperature" id="frozen">

                                                </label>

                                            </div>

                                            <!-- Exp Date -->

                                            <div class="form-check mb-4">

                                                <input class="form-check-input" type="checkbox" value="expDate"

                                                    id="expDate" checked>

                                                <label class="form-check-label w-75 pe-5" for="date-input">

                                                    <span class="mb-1 h6">Expiry Date of Product</span>

                                                    <input type="date" class="product-date form-control"

                                                        id="date-input">

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- /Attributes Tab -->

                                    <!-- Advanced Tab -->

                                    <div class="tab-pane fade" id="advanced" role="tabpanel">

                                        <h5 class="mb-4">Advanced</h5>

                                        <div class="row">

                                            <!-- Product Id Type -->

                                            <div class="col">

                                                <label class="form-label" for="product-id">

                                                    <span class="mb-0 h6">Product ID Type</span>

                                                </label>

                                                <select id="product-id" class="select2 form-select"

                                                    data-placeholder="ISBN">

                                                    <option value="">ISBN</option>

                                                    <option value="ISBN">ISBN</option>

                                                    <option value="UPC">UPC</option>

                                                    <option value="EAN">EAN</option>

                                                    <option value="JAN">JAN</option>

                                                </select>

                                            </div>

                                            <!-- Product Id -->

                                            <div class="col">

                                                <label class="form-label" for="product-id-1">

                                                    <span class="mb-0 h6">Product ID</span>

                                                </label>

                                                <input type="number" id="product-id-1" class="form-control"

                                                    placeholder="ISBN Number" />

                                            </div>



                                        </div>

                                    </div>

                                    <!-- /Advanced Tab -->



                                </div>

                            </div>

                            <!-- /Options-->

                        </div>

                    </div>

                </div> --}}

                    <!-- /Inventory -->

                </div>

                <div class="col-12 col-lg-4">

                    <div class="card mb-4">

                        <div class="card-header">

                            <h5 class="card-title mb-0">Inventory</h5>

                        </div>

                        <div class="card-body">

                            <div class="mb-3">

                                {{-- {{dd($data->product_color)}} --}}

                                <label class="form-label" for="ecommerce-product-price">Prodcut Colors</label>

                                <input type="text" class="form-control" id="ecommerce-product-color"
                                    placeholder="Product Color" name="product_color" aria-label="Product color"
                                    value="{{ $data->product_color }}">

                                <span class="error">{{ $errors->first('product_color') }}</span>

                            </div>

                            <div class="mb-3">

                                <label class="form-label" for="ecommerce-product-discount-price">Prodcut Size</label>

                                <input type="text" class="form-control" id="ecommerce-product-size"
                                    placeholder="Prodcut Size" name="product_size" aria-label="Product size"
                                    value="{{ $data->product_size }}">

                                <span class="error">{{ $errors->first('product_size') }}</span>

                            </div>

                        </div>

                    </div>

                    <div class="card mb-4">

                        <div class="card-header">

                            <h5 class="card-title mb-0">Pricing</h5>

                        </div>

                        <div class="card-body">

                            <div class="mb-3">

                                <label class="form-label" for="ecommerce-product-price">Base Price</label>

                                <input type="number" class="form-control" id="ecommerce-product-price"
                                    placeholder="Price" name="product_price" aria-label="Product price"
                                    value="{{ $data->product_price }}">

                                <span class="error">{{ $errors->first('product_price') }}</span>

                            </div>

                            <div class="mb-3">

                                <label class="form-label" for="ecommerce-product-discount-price">Sale Price</label>

                                <input type="number" class="form-control" id="ecommerce-product-discount-price"
                                    placeholder="Sale Price" name="product_sale_price" aria-label="Product sale price"
                                    value="{{ $data->product_sale_price }}">

                                <span class="error">{{ $errors->first('product_sale_price') }}</span>

                            </div>

                        </div>

                    </div>

                    <div class="card mb-4">

                        <div class="card-header">

                            <h5 class="card-title mb-0">Organize</h5>

                        </div>

                        <div class="card-body">

                            <div class="mb-3 col ecommerce-select2-dropdown">

                                <label class="form-label mb-1" for="status-org">Select Category

                                </label>

                                <select id="category_id" class="select2 form-select" name="category_id"
                                    data-placeholder="Select Category">

                                    <option value="">Select Category</option>

                                    @foreach ($category as $value)
                                        <option value="{{ $value->id }}"
                                            {{ $value->id == $data->category_id ? 'selected' : '' }}>

                                            {{ $value->category_name }}</option>
                                    @endforeach

                                </select>

                                <span class="error">{{ $errors->first('category_id') }}</span>

                            </div>

                            <div class="mb-3 col ecommerce-select2-dropdown">

                                <label class="form-label mb-1" for="status-org">Select Sub Category

                                </label>

                                <select id="sub_category_id" class="select2 form-select" name="sub_category_id"
                                    data-placeholder="Select Sub Category">

                                    <option value="">Select Sub Category</option>

                                    @foreach ($subcategory as $value)
                                        <option value="{{ $value->id }}">

                                            {{ $value->sub_category_name }}</option>
                                    @endforeach

                                </select>

                                <span class="error">{{ $errors->first('category_id') }}</span>

                            </div>

                            <div class="mb-3 col ecommerce-select2-dropdown">

                                <label class="form-label mb-1" for="status-org">Status

                                </label>

                                <select id="status-org" class="select2 form-select" name="status"
                                    data-placeholder="Select Status">

                                    <option value="">Select Status</option>

                                    <option value="1" {{ $data->status == '1' ? 'selected' : '' }}>Active</option>

                                    <option value="0" {{ $data->status == '0' ? 'selected' : '' }}>Inactive</option>

                                </select>

                                <span class="error">{{ $errors->first('status') }}</span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <img src="" class="" alt="">

    </form>

@endsection

<script>
    $(document).ready(function() {

        $('#imageUpload').on('change', function() {

            $('#imagePreview').html('');

            var files = $(this)[0].files;

            for (var i = 0; i < files.length; i++) {

                var reader = new FileReader();

                reader.onload = function(e) {

                    $('#imagePreview').append('<img src="' + e.target.result +

                        '" width="80px" height="80px" class="me-4 border">');

                };

                reader.readAsDataURL(files[i]);

            }

        });



        $('#category_id').ready(function() {

            // $(document).ready('#category_id', function(e) {

            var category_id = $('#category_id').val();

            $.ajax({

                url: "{{ route('app-ecommerce-product-get-subcategory') }}",

                type: "POST",

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },

                data: {

                    category_id: category_id

                },

                success: function(data) {

                    console.log(data.data);

                    $('#sub_category_id').empty();

                    $.each(data.data, function(index, subcategory) {

                        console.log(subcategory.id);

                        $('#sub_category_id').append('<option value="' + subcategory

                            .id + '">' + subcategory.sub_category_name +

                            '</option>');

                    })

                }

            })

        });

        $('#category_id').on('change', function() {

            // $(document).ready('#category_id', function(e) {

            var category_id = $('#category_id').val();

            $.ajax({

                url: "{{ route('app-ecommerce-product-get-subcategory') }}",

                type: "POST",

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },

                data: {

                    category_id: category_id

                },

                success: function(data) {

                    console.log(data.data);

                    $('#sub_category_id').empty();

                    $.each(data.data, function(index, subcategory) {

                        console.log(subcategory.id);

                        $('#sub_category_id').append('<option value="' + subcategory

                            .id + '">' + subcategory.sub_category_name +

                            '</option>');

                    })

                }

            })

        });

    });



    function deleteImage(id, element) {
        $.ajax({
            url: "{{ url('app/ecommerce/product/image/delete/') }}" + "/" + id,
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                // Remove only the specific image preview element
                $(element).closest('div').remove();
            }
        });
    }
</script>
