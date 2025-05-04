@extends('layouts.app')

@section('title', 'Thank You For Your Purchase')

@section('content')
<div class="thank-you-wrapper d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="thank-you-card mx-auto">
            <div class="checkmark-circle mb-4">
                <i class="bi bi-check-circle-fill text-success fs-1"></i>
            </div>
            <h1 class="thank-you-title">Thank You for Your Order!</h1>
            <p class="thank-you-subtitle">We’ve received your order and will begin processing it shortly.</p>

            {{-- <div class="order-details mt-4">
                <h5 class="text-muted mb-3">Order Summary</h5>
                <ul class="list-unstyled">
                    <li><strong>Tracking Number:</strong> <span class="tracking-number">skyred-{{ Str::random(10) }}</span></li>
                    <li><strong>Payment Method:</strong> <span class="payment-method">Cash on Delivery</span></li>
                </ul>
            </div> --}}

            <div class="thank-you-actions mt-4">
                <a href="{{ url('collections') }}" class="btn btn-primary px-4">Continue Shopping</a>
            </div>
        </div>
    </div>
</div>
@endsection
