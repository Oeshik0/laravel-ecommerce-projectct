@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        @if(session('message'))
    <div class="alert alert-success text-center">
        {{ session('message') }}
    </div>
@endif

        <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
                <h2 class="fw-bold">Get in Touch</h2>
                <p class="text-muted">Have questions, feedback, or a custom request? We’re here to help you 24/7.</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ url('/contact') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" name="name" class="form-control" required placeholder="John Doe">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Your Email</label>
                        <input type="email" name="email" class="form-control" required placeholder="email@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Your Message</label>
                        <textarea name="message" rows="5" class="form-control" required placeholder="Write your message here..."></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary px-5">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
