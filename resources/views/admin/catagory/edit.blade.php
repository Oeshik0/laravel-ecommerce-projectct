@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12"></div>
    <div class="card">
        <div class="card-header">
            <h3>Edit Category
                <a href="{{ url('admin/catagory') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
            </h3>
        </div>
        <div class="card-body">

            <!-- Display validation errors -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('admin/catagory/'.$catagory->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $catagory->name }}" class="form-control" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" value="{{ $catagory->slug  }}" class="form-control" />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ $catagory->description  }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{ asset('uploads/catagory/' . $catagory->image) }}" width="60px" height="60px"/>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label><br />
                        <input type="checkbox" name="status" {{ $catagory->status=='1' ? 'checked' : '' }} />
                    </div>

                    <div class="col-md-12">
                        <h5>SEO Tags</h5>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $catagory->meta_title }}" class="form-control" />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" rows="3">{{ $catagory->meta_keyword }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3">{{ $catagory->meta_description }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
