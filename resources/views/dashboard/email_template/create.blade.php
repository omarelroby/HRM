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
                        <form method="POST" action="https://demo.workdo.io/hrmgo-saas/email_template_store/1" accept-charset="UTF-8">
                            @csrf
                            <input name="_token" type="hidden" value="kllnx0Yabyii7EaddEligMC8gmU2Fic56610z2OV">

                            <!-- Subject Input -->
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input class="form-control" required name="subject" type="text" value="New User" id="subject">
                            </div>

                            <!-- Email Message Textarea (English) -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Email Message (English)</label>
                                <textarea class="form-control" id="description" name="description" required>
                                    <p>Hello,<br>Welcome to {app_name}.</p>
                                    <p><strong>You are now a user.</strong></p>
                                    <p><strong>Email</strong>: {email}<br><strong>Password</strong>: {password}</p>
                                    <p>{app_url}</p>
                                    <p>Thanks,<br>{app_name}</p>
                                </textarea>
                            </div>

                            <!-- Email Message Textarea (Arabic) -->
                            <div class="mb-3">
                                <label for="description_ar" class="form-label">Email Message (Arabic)</label>
                                <textarea class="form-control" id="description_ar" name="description_ar" required>
                                    <p>مرحبًا،<br>أهلاً بكم في {app_name}.</p>
                                    <p><strong>أنت الآن مستخدم.</strong></p>
                                    <p><strong>البريد الإلكتروني</strong>: {email}<br><strong>كلمة المرور</strong>: {password}</p>
                                    <p>{app_url}</p>
                                    <p>شكرًا،<br>{app_name}</p>
                                </textarea>
                            </div>

                            <!-- Hidden Input for Language -->
                            <input name="lang" type="hidden" value="en">

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

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
