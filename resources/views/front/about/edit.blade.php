@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="mb-0">{{ __('Update About Us') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('about-us.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Title (English)</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $about->title) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Title (Arabic)</label>
                            <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $about->title_ar) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Description (English)</label>
                            <textarea id="description" name="description" class="form-control">{{ old('description', $about->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Description (Arabic)</label>
                            <textarea id="description_ar" name="description_ar" class="form-control">{{ old('description_ar', $about->description_ar) }}</textarea>
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
        .ck-editor__editable {
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
                language: 'en' // Ensure English language is set
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
                language: 'ar' // Set Arabic language (automatically enables RTL)
            })
            .then(editor => {
                // Force RTL direction for Arabic editor
                editor.editing.view.change(writer => {
                    writer.setAttribute('dir', 'rtl', editor.editing.view.document.getRoot());
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
