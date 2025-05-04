@extends('layouts.app')

@section('title', 'All Catagories')

@section('content')
<div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>
                @forelse($catagories as $catagoryItem)

               
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="{{url('/collections/'.$catagoryItem->slug)}}">
                            <div class="category-card-img">
                                <img src="{{asset('uploads/catagory/' . $catagoryItem->image)}}" class="w-100" height="250px" width="40px" alt="{{$catagoryItem->name}}">
                            </div>
                            <div class="category-card-body">
                                <h5>{{$catagoryItem->name}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                 @empty
                 <div class="col-md-12">
                    <h5>No Catagories Available</h5>
                 </div>

                @endforelse
                
            </div>
        </div>
    </div>

    <!-- Why Shop With Us Section -->
<div class="py-5 bg-white border-top">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Shop with SkyRed?</h2>
            <p class="text-muted">We're more than just categories — we're your trusted online destination.</p>
        </div>

        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="p-4 shadow-sm rounded hover-shadow h-100">
                    <i class="fas fa-tags fa-2x text-primary mb-3"></i>
                    <h5 class="fw-semibold">Affordable Prices</h5>
                    <p class="text-muted">We offer competitive prices on all our products to fit your budget.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="p-4 shadow-sm rounded hover-shadow h-100">
                    <i class="fas fa-box-open fa-2x text-success mb-3"></i>
                    <h5 class="fw-semibold">Diverse Selection</h5>
                    <p class="text-muted">Explore a variety of categories — all in one place.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="p-4 shadow-sm rounded hover-shadow h-100">
                    <i class="fas fa-lock fa-2x text-danger mb-3"></i>
                    <h5 class="fw-semibold">Secure Checkout</h5>
                    <p class="text-muted">Your safety is our priority. Enjoy a secure and smooth shopping experience.</p>
                </div>
            </div>
        </div>

        {{-- <div class="text-center mt-4">
            <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg">Explore All Products</a>
        </div> --}}
    </div>
</div>




@endsection