@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">
                            <i class="fa fa-shopping-cart"></i> Order Details
                            <a href="{{ url('orders') }}" class="btn btn-danger btn-sm float-end">Back</a>
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Information</h5>
                                <hr>
                                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                                <p><strong>Tracking No:</strong> {{ $order->tracking_no }}</p>
                                <p><strong>Order Date:</strong> {{ $order->created_at->timezone('Asia/Dhaka')->format('d-m-Y h:i A') }}</p>

                                <p><strong>Payment Mode:</strong> {{ $order->payment_mode }}</p>
                                <p><strong>Status:</strong>
                                    <span
                                        class="badge 
                                    @if ($order->status_message == 'completed') bg-success
                                    @elseif($order->status_message == 'cancelled') bg-danger
                                    @else bg-warning text-dark @endif">
                                        {{ ucfirst($order->status_message) }}
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h5>Customer Information</h5>
                                <hr>
                                <p><strong>Full Name:</strong> {{ $order->fullname }}</p>
                                <p><strong>Email:</strong> {{ $order->email }}</p>
                                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                                <p><strong>Address:</strong> {{ $order->address }}</p>
                                <p><strong>Pincode:</strong> {{ $order->pincode }}</p>
                            </div>
                        </div>

                        <h5 class="mt-4">Order Items</h5>
                        <hr>

                        @if ($order->orderItems->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderItems as $item)
                                            <tr>
                                                <td>{{ $item->product->name ?? 'N/A' }}</td>
                                                <td>Tk {{ number_format($item->price, 2) }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>Tk {{ number_format($item->price * $item->quantity, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">No items found in this order</div>
                        @endif

                        @if ($order->orderItems->count() > 0)
                            @php
                                $calculatedTotal = $order->orderItems->sum(function ($item) {
                                    return $item->price * $item->quantity;
                                });
                            @endphp
                            <div class="text-end mt-3">
                                <h5>Total Amount: TK{{ number_format($calculatedTotal, 2) }}</h5>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
