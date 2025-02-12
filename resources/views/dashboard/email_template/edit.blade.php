@extends('dashboard.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Variables Section -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h6 class="font-weight-bold mb-0">Variables</h6>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <span>App Name</span>
                                <span class="text-primary">{app_name}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Company Name</span>
                                <span class="text-primary">{company_name}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <span>App URL</span>
                                <span class="text-primary">{app_url}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Email</span>
                                <span class="text-primary">{email}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Password</span>
                                <span class="text-primary">{password}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Email Template Form Section -->
            <div class="col-md-12">
                <div class="card h-100">
                    <div class="card-header bg-white">
                        <h6 class="font-weight-bold mb-0">Email Template</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('email-template.update',$email->id)}}" accept-charset="UTF-8">
                            @csrf
                            @method('put')

                            <!-- Subject Input -->
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input class="form-control" required name="subject" type="text" value="{{$email->subject??''}}"  id="subject">
                            </div>


                            <!-- Email Message Textarea (English) -->
                            <div class="mb-3">
                                <label for="message" class="form-label">Email Message (English)</label>
                                <textarea class="form-control" id="message" name="message" required>{!!$email->message  !!} </textarea>
                            </div>

                            <!-- Email Message Textarea (Arabic) -->
                            <div class="mb-3">
                                <label for="message_ar" class="form-label">Email Message (Arabic)</label>
                                <textarea class="form-control" id="message_ar" name="message_ar" required>{!! $email->message_ar !!} </textarea>
                            </div>

                            <!-- Hidden Input for Language -->
                            <input name="lang" type="hidden" value="en">

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <style>
        /* Custom editor height */
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>

    <script>
        // Configure English editor
        ClassicEditor
            .create(document.querySelector('#message'), {
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
            .create(document.querySelector('#message_ar'), {
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
