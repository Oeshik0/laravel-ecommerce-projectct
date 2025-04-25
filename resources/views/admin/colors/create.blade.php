@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12"></div>
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Add Colors
                    <a href="{{ url('admin/colors') }}" class="btn btn-primary btn-sm text-white float-end">
                        Back</a>
                </h3>
            </div>
            <div class="card-body">
    <form action="{{ url('admin/colors') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-12 mb-3">
                <label>Color Name</label>
                <input type="text" name="name"  class="form-control"  />
            </div>

            <div class="col-md-12 mb-3">
                <label>Color Code</label>
                <input type="text" name="code"  class="form-control"  />
            </div>

            <div class="col-md-12 mb-3">
                <label>Status</label><br />
                <input type="checkbox" name="status"  /> Checked = Hidden
            </div>

            <div class="col-md-12 mb-3 text-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>

    </div>
    </div>
@endsection
