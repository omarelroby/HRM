@extends('dashboard.layouts.master')

@section('content')
    <h1>{{ isset($homeSection) ? 'Edit' : 'Create' }} Home Section</h1>

    <form action="{{ isset($homeSection) ? route('home-sections.update', $homeSection) : route('home-sections.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($homeSection))
            @method('PUT')
        @endif

        <div class="form-group">
            <label>Title (English)</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $homeSection->title ?? '') }}" required>
        </div>

        <div class="form-group">
            <label>Title (Arabic)</label>
            <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $homeSection->title_ar ?? '') }}" required>
        </div>

        <div class="form-group">
            <label>Description (English)</label>
            <textarea name="description" class="form-control">{{ old('description', $homeSection->description ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label>Description (Arabic)</label>
            <textarea name="description_ar" class="form-control">{{ old('description_ar', $homeSection->description_ar ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control-file">
            @if(isset($homeSection) && $homeSection->image)
                <img src="{{ asset('storage/'.$homeSection->image) }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
