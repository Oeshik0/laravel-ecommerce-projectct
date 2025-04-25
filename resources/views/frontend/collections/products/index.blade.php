@extends('layouts.app')

@section('title')
{{$catagory->meta_title}}
@endsection

@section('meta_keyword')
{{$catagory->meta_keyword}}
@endsection

@section('meta_description')
{{$catagory->meta_description}}
@endsection

@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Products</h4>
            </div>
        </div>
        <div class="row">
           <livewire:frontend.product.index  :catagory="$catagory" />
        </div>
    </div>
</div>

<!-- About This Category Section -->
<div class="py-5 bg-white border-top">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Why Choose Our {{ $catagory->name }} Products?</h2>
            <p class="text-muted">At SkyRed, we ensure every product in the <strong>{{ $catagory->name }}</strong> category meets your expectations and style.</p>
        </div>

        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="p-4 shadow-sm rounded hover-shadow h-100">
                    <i class="fas fa-star fa-2x text-warning mb-3"></i>
                    <h5 class="fw-semibold">Top Quality</h5>
                    <p class="text-muted">We only feature reliable and highly-rated items — guaranteed to last and satisfy.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="p-4 shadow-sm rounded hover-shadow h-100">
                    <i class="fas fa-shipping-fast fa-2x text-primary mb-3"></i>
                    <h5 class="fw-semibold">Fast Delivery</h5>
                    <p class="text-muted">Get your order at your doorstep in record time, no delays.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="p-4 shadow-sm rounded hover-shadow h-100">
                    <i class="fas fa-thumbs-up fa-2x text-success mb-3"></i>
                    <h5 class="fw-semibold">Customer Satisfaction</h5>
                    <p class="text-muted">Our customers love the products — and we’re sure you will too.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ url('/contact') }}" class="btn btn-outline-primary btn-lg">Need Help? Contact Us</a>
        </div>
    </div>
</div>

@endsection
