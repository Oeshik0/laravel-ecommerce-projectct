@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12"></div>
    @if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3>Products
                <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm text-white float-end">Add Products</a>
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Catagory</th>
                        <th>Product</th>
                        <th>Price</th>
                        {{-- <th>Quantity</th> --}}
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if( $product->catagory)
                        {{ $product->catagory->name }}
                        @else
                        No Catagory
                        @endif
                       </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->selling_price }}</td>
                        {{-- <td>{{ $product->quantity }}</td> --}}
                        <td>{{ $product->status == '1' ? 'Hidden' : 'Visible' }}</td>
                        <td>
                            <a href="{{ url('admin/products/'.$product->id. '/edit') }}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{ url('admin/products/'.$product->id. '/delete') }}" onclick="return confirm('Are You Sure,You Want To Delete This Data?')" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No Produts Available</td>
                    </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


@endsection