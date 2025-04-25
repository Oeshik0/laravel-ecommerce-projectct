@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <h4 class="alert alert-success mb-2">{{ session('message') }}</h4>
            @endif
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Edit Product
                        <a href="{{ url('admin/products') }}" class="btn btn-light btn-sm float-end">
                            <i class="mdi mdi-arrow-left"></i> BACK
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <!-- Display validation errors -->

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <ul class="nav nav-tabs" id="productTab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab">
                                    <i class="mdi mdi-home"></i> Home
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo"
                                    type="button" role="tab">
                                    <i class="mdi mdi-google"></i> SEO Tags
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
                                    type="button" role="tab">
                                    <i class="mdi mdi-information"></i> Details
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image"
                                    type="button" role="tab">
                                    <i class="mdi mdi-camera"></i> Images
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors"
                                    type="button" role="tab">
                                    <i class="mdi mdi-palette"></i> Product Colors
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content mt-3" id="productTabContent">
                            <!-- General Info -->
                            <div class="tab-pane fade show active" id="home" role="tabpanel">
                                <div class="mb-3">
                                    <label class="form-label">Select Catagory</label>
                                    <select name="catagory_id" class="form-control">
                                        @foreach ($catagories as $catagory)
                                            <option value="{{ $catagory->id }}"
                                                {{ $catagory->id == $product->catagory_id ? 'selected' : '' }}>
                                                {{ $catagory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" name="name" value="{{ $product->name }}"
                                            class="form-control" placeholder="Enter product name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Product Slug</label>
                                        <input type="text" name="slug" value="{{ $product->slug }}"
                                            class="form-control" placeholder="Enter product slug">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Select Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}"
                                                {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Small Description (Max: 500 words)</label>
                                    <textarea name="small_description" class="form-control" rows="3">{{ $product->small_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                </div>
                            </div>

                            <!-- SEO Tags -->
                            <div class="tab-pane fade" id="seo" role="tabpanel">
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" value="{{ $product->meta_title }}"
                                        class="form-control" placeholder="Enter meta title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter meta description">{{ $product->meta_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Keywords</label>
                                    <textarea name="meta_keyword" class="form-control" rows="3" placeholder="Enter meta keywords">{{ $product->meta_keyword }}</textarea>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="tab-pane fade" id="details" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Original Price</label>
                                        <input type="text" name="original_price"
                                            value="{{ $product->original_price }}" class="form-control"
                                            placeholder="Enter original price">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Selling Price</label>
                                        <input type="text" name="selling_price" value="{{ $product->selling_price }}"
                                            class="form-control" placeholder="Enter selling price">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input type="text" name="quantity" value="{{ $product->quantity }}"
                                            class="form-control" placeholder="Enter quantity">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Trending</label><br />
                                        <input type="checkbox" name="trending"
                                            {{ $product->trending == '1' ? 'checked' : '' }}>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Status</label><br />
                                        <input type="checkbox" name="status"
                                            {{ $product->status == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Images -->
                            <div class="tab-pane fade" id="image" role="tabpanel">
                                <div class="mb-3">
                                    <label class="form-label">Upload Product Images</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>
                                <div>
                                    @if ($product->productImages && $product->productImages->count() > 0)
                                        <div class="row">
                                            @foreach ($product->productImages as $image)
                                                <div class="col-md-1 mb-2 ">
                                                    <img src="{{ asset($image->image) }}"
                                                        style="width: 80px; height: 80px;" alt="Product Image">
                                                    <a href="{{ url('admin/product-image/' . $image->id . '/delete') }}"
                                                        class="d-block">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <h5>No Image Added</h5>
                                    @endif
                                </div>
                            </div>

                            <div class="tab-pane fade" id="colors" role="tabpanel">
                                <div class="mb-3">
                                    <h4>Add Product Color</h4>
                                    <label class="form-label">Select Color</label>
                                    <div class="row">
                                        @forelse ($colors as $coloritem)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3">
                                                    Color: <input type="checkbox" name="colors[{{ $coloritem->id }}]"
                                                        value="{{ $coloritem->id }}" />
                                                    {{ $coloritem->name }}
                                                    <br />
                                                    Quantiy:<input type="number"
                                                        name="colorquantity[{{ $coloritem->id }}]"
                                                        style="width: 70px; border: 1px solid" />
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h5>No colors found</h5>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Color Name</th>
                                                <th>Quantity</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $prodColor)
                                                <tr class="prod-color-tr">
                                                    <td>
                                                        @if ($prodColor->color)
                                                            {{ $prodColor->color->name }}
                                                        @else
                                                            No Color Found
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="input-group mb-3" style="width: 150px">
                                                            <input type="text" value="{{ $prodColor->quantity }}"
                                                                class="productColorQuantity form-control form-control-sm" />
                                                            <button type="button" value="{{ $prodColor->id }}"
                                                                class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $prodColor->id }}"
                                                            class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>



                        </div>

                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-success">
                                <i class="mdi mdi-content-save"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (CDN) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Your update script -->
    <script>
        $(document).ready(function() {
            console.log("🟢 DOM Ready. jQuery is loaded:", typeof $);

            $(document).on('click', '.updateProductColorBtn', function() {
                console.log("🟡 Update button clicked");

                let prod_color_id = $(this).val();
                let qty = $(this).closest('.input-group').find('.productColorQuantity').val();

                let data = {
                    'qty': qty,
                    'product_id': "{{ $product->id }}"
                };

                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/" + prod_color_id,
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log("✅ Success:", response.message);
                        alert(response.message);
                    },
                    error: function(xhr) {
                        console.log("❌ Error occurred:", xhr.responseText);
                        alert("Something went wrong!");
                    }
                });
            });

            $(document).on('click', '.deleteProductColorBtn', function() {
                var prod_color_id = $(this).val();
                var thisClick = $(this);

                $.ajax({
                    type: "GET",
                    url: "/admin/product-color/" + prod_color_id + "/delete",
                    success: function(response) {
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message);
                    },
                    error: function(xhr) {
                        alert('Something went wrong!');
                        console.error(xhr.responseText);
                    }
                });
            });

        });
    </script>


@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).on('click', '.updateProductColorBtn', function() {
            console.log("✅ Update button clicked");

            let prod_color_id = $(this).val();
            let qty = $(this).closest('.input-group').find('.productColorQuantity').val();

            let data = {
                'qty': qty,
                'product_id': "{{ $product->id }}" // Pass this from Blade or via data attribute
            };

            $.ajax({
                type: "POST",
                url: "/admin/product-color/" + prod_color_id,
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response.message);
                    alert(response.message);
                }
            });
        });
    </script>
@endsection
