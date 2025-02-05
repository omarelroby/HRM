@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white  ">
                    <h5 class="mb-0">{{ __('Edit Feature') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('features.update', $feature->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Name (English) -->
                        <div class="form-group">
                            <label>{{ __('Title (English)') }}</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $feature->title ?? '') }}" required>
                        </div>

                        <!-- Name (Arabic) -->
                        <div class="form-group">
                            <label>{{ __('Title (Arabic)') }}</label>
                            <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $feature->title_ar ?? '') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Description (English)</label>
                            <textarea name="description" class="form-control">{{ old('description', $feature->description ?? '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Description (Arabic)</label>
                            <textarea name="description_ar" class="form-control">{{ old('description_ar', $feature->description_ar ?? '') }}</textarea>
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group">
                            <label>{{ __('Feature Icon') }}</label>
                            <input type="file" name="icon" class="form-control">
                            @if(isset($feature) && $feature->icon)
                                <img src="{{ asset('storage/app/public/'.$feature->icon) }}" width="100" class="mt-2 img-thumbnail">
                            @endif
                        </div>


                        <button type="submit" class="btn btn-success my-2">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
