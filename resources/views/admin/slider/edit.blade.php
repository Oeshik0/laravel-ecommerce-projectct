@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12"></div>
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Edit Sliders
                    <a href="{{ url('admin/sliders/') }}" class="btn btn-primary btn-sm text-white float-end">
                        Back</a>
                </h3>
            </div>
            <div class="card-body">
    <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT');

        <div class="row">
            <div class="col-md-12 mb-3">
                <label> Title</label>
                <input type="text" name="title" value="{{$slider->title}}" class="form-control"  />
            </div>

            <div class="col-md-12 mb-3">
                <label>Descrption</label>
                <textarea name="description" class="form-control" rows="3">{{$slider->description}}"</textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label> Image</label>
                <input type="file" name="image"  class="form-control"  />
                <img src="{{ asset($slider->image) }}" style="width: 50px; height: 50px;" alt="slider" />

            </div>

            <div class="col-md-12 mb-3">
                <label>Status</label><br />
                <input type="checkbox" name="status" {{$slider->status=='1'? 'checked':''}}  /> Checked = Hidden
            </div>

            <div class="col-md-12 mb-3 text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>

    </div>
    </div>
@endsection
