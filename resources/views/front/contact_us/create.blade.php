@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white  ">
                    <h1>{{   __('Create Feature') }}</h1>
                </div>
                <div class="card-body">

    <form action="{{  route('features.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($client))
            @method('PUT')
        @endif

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
                <img src="{{ asset('storage/app/public/'.$feature->image) }}" width="100" class="mt-2 img-thumbnail">
            @endif
        </div>

        <button type="submit" class="btn btn-primary my-2">{{ __('Save') }}</button>
    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        // Configure English editor
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                        'alignment', 'indent', 'outdent', '|',
                        'imageUpload', 'blockQuote', 'insertTable', 'mediaEmbed', 'undo', 'redo'
                    ]
                },
                height: '500px' // Set editor height
            })
            .catch(error => {
                console.error(error);
            });

        // Configure Arabic editor with RTL support
        ClassicEditor
            .create(document.querySelector('#description_ar'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                        'alignment', 'indent', 'outdent', '|',
                        'imageUpload', 'blockQuote', 'insertTable', 'mediaEmbed', 'undo', 'redo'
                    ]
                },
                height: '500px', // Set editor height
                language: {
                    content: 'ar' // Set RTL direction for Arabic content
                },
                // Optional: Set text direction
                direction: 'rtl'
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
