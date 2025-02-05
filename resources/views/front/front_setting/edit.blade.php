@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="mb-0">{{ __('Update Setting') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('front-setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address', $setting->address) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $setting->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $setting->phone) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Twitter</label>
                            <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $setting->twitter) }}">
                        </div>

                        <div class="form-group">
                            <label>Instagram</label>
                            <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $setting->instagram) }}">
                        </div>

                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $setting->facebook) }}">
                        </div>

                        <div class="form-group">
                            <label>LinkedIn</label>
                            <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $setting->linkedin) }}">
                        </div>

                        <button type="submit" class="btn btn-primary my-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <style>
        /* Custom editor height */
        .ck-editor__editable_inline {
            min-height: 500px;
        }
    </style>
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
