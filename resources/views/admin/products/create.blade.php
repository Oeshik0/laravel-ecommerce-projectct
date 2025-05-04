@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Add Product
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
                    <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                        @csrf

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
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color"
                                    type="button" role="tab">
                                    <i class="mdi mdi-palette"></i> Select Color
                                </button>
                            </li>

                        </ul>

                        <div class="tab-content mt-3" id="productTabContent">
                            <!-- General Info -->
                            <div class="tab-pane fade show active" id="home" role="tabpanel">
                                <div class="mb-3">
                                    <label class="form-label">Catagory</label>
                                    <select name="catagory_id" class="form-control">
                                        @foreach ($catagories as $catagory)
                                            <option value="{{ $catagory->id }}">{{ $catagory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter product name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Product Slug</label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="Enter product slug">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Select Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Small Description (Max: 500 words)</label>
                                    <textarea name="small_description" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
                                </div>
                            </div>

                            <!-- SEO Tags -->
                            <div class="tab-pane fade" id="seo" role="tabpanel">
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        placeholder="Enter meta title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter meta description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Keywords</label>
                                    <textarea name="meta_keyword" class="form-control" rows="3" placeholder="Enter meta keywords"></textarea>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="tab-pane fade" id="details" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Original Price</label>
                                        <input type="text" name="original_price" class="form-control"
                                            placeholder="Enter original price">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control"
                                            placeholder="Enter selling price">
                                    </div>
                                    {{-- <div class="col-md-4 mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input type="text" name="quantity" class="form-control"
                                            placeholder="Enter quantity">
                                    </div> --}}
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="trending"
                                                id="trending">
                                            <label class="form-check-label" for="trending">Trending</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="status"
                                                id="status">
                                            <label class="form-check-label" for="status">Status</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Images -->
                            <div class="tab-pane fade" id="image" role="tabpanel">
                                <div class="mb-3">
                                    <label class="form-label">Upload Product Images</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>
                            </div>
                            {{-- Color --}}
                            <div class="tab-pane fade" id="color" role="tabpanel">
                                <div class="mb-3">
                                    <label class="form-label">Select Color</label>
                                    <div class="row">
                                        @forelse ($colors as $coloritem)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3">
                                                    Color: <input type="checkbox" name="colors[{{ $coloritem->id }}]"
                                                        value="{{ $coloritem->id }}" />
                                                    {{ $coloritem->name }}
                                                    <br />
                                                    Quantiy:<input type="number" name="colorquantity[{{ $coloritem->id }}]"
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
                            </div>

                        </div>

                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-success">
                                <i class="mdi mdi-content-save"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
