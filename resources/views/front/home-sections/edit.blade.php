@extends('dashboard.layouts.master')


@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="mb-0">{{ __('Update Home Section') }}</h5>
                </div>
                <div class="card-body">

    <form action="{{ route('home-sections.update', $homeSection->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Title (English)</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $homeSection->title) }}" required>
        </div>

        <div class="form-group">
            <label>Title (Arabic)</label>
            <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $homeSection->title_ar) }}" required>
        </div>

        <div class="form-group">
            <label>Description (English)</label>
            <textarea name="description" class="form-control">{{ old('description', $homeSection->description) }}</textarea>
        </div>

        <div class="form-group">
            <label>Description (Arabic)</label>
            <textarea name="description_ar" class="form-control">{{ old('description_ar', $homeSection->description_ar) }}</textarea>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @if($homeSection->image)
                <img src="{{ asset('storage/app/public/'.$homeSection->image) }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary my-2">Update</button>
    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
