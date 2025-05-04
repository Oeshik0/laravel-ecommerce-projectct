@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

    <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-inner">
            @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{$key== 0 ? 'active':''}} ">
                    @if ($sliderItem->image)
                        <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="..." style="height: 700px; object-fit: cover;">
                    @endif

                    
                    <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            {!! $sliderItem->title !!}
                        </h1>
                        <p>
                            {!! $sliderItem->description !!}
                        </p>
                        <div>
                            <a href="/collections" class="btn btn-slider">
                                Get Now
                            </a>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    <br>




    <!-- About SkyRed -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-4 animate__animated animate__fadeInDown">Welcome to SkyRed</h2>
        <p class="lead text-muted animate__animated animate__fadeInUp">
            SkyRed is a modern e-commerce platform that delivers trendsetting products, unbeatable deals, and seamless shopping experiences. From gadgets to fashion,
            we bring the best to your doorstep — fast, reliable, and with customer support you can count on.
        </p>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-4 animate__animated animate__fadeInLeft">
                <div class="p-4 shadow-sm rounded bg-white h-100 hover-shadow">
                    <i class="fas fa-shipping-fast fa-3x text-primary mb-3"></i>
                    <h5 class="fw-semibold">Fast & Free Delivery</h5>
                    <p class="text-muted">Nationwide delivery with reliable logistics partners and no hidden fees.</p>
                </div>
            </div>
            <div class="col-md-4 animate__animated animate__fadeInUp">
                <div class="p-4 shadow-sm rounded bg-white h-100 hover-shadow">
                    <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                    <h5 class="fw-semibold">Top Quality</h5>
                    <p class="text-muted">Every product is selected and reviewed to ensure maximum quality and value.</p>
                </div>
            </div>
            <div class="col-md-4 animate__animated animate__fadeInRight">
                <div class="p-4 shadow-sm rounded bg-white h-100 hover-shadow">
                    <i class="fas fa-headset fa-3x text-danger mb-3"></i>
                    <h5 class="fw-semibold">24/7 Support</h5>
                    <p class="text-muted">Need help? Our support team is always ready to assist you — day or night.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container">
        <h2 class="fw-bold animate__animated animate__zoomIn">Join Thousands of Happy Shoppers</h2>
        <p class="lead animate__animated animate__fadeIn">Discover exclusive deals and experience effortless online shopping with SkyRed.</p>
        <a href="{{ url('/collections') }}" class="btn btn-light btn-lg mt-3 animate__animated animate__pulse animate__infinite">Start Shopping</a>
    </div>
</section>

@endsection
