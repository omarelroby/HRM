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
                    @if($email->id==1)
                        <div class="card-body bg-light p-4 rounded">
                            <div class="mb-3">
                                <strong>App Name:</strong> <span class="text-primary">{app_name}</span>
                            </div>
                            <div class="mb-3">
                                <strong>Company Name:</strong> <span class="text-success">{company_name}</span>
                            </div>
                            <div class="mb-3">
                                <strong>App URL:</strong> <a href="{app_url}" class="text-info" target="_blank">{app_url}</a>
                            </div>
                            <div class="mb-3">
                                <strong>Employee Name:</strong> <span class="text-secondary">{employee_name}</span>
                            </div>
                            <div class="mb-3">
                                <strong>Password:</strong> <span class="text-danger">{employee_password}</span>
                            </div>
                            <div class="mb-3">
                                <strong>Employee Email:</strong> <a href="mailto:{employee_email}" class="text-primary">{employee_email}</a>
                            </div>
                            <div class="mb-3">
                                <strong>Employee Branch:</strong> <span class="text-muted">{employee_branch}</span>
                            </div>
                            <div class="mb-3">
                                <strong>Employee Department:</strong> <span class="text-muted">{employee_department}</span>
                            </div>
                            <div class="mb-3">
                                <strong>Employee Designation:</strong> <span class="text-muted">{employee_designation}</span>
                            </div>
                        </div>

                    @elseif($email->id==2)
                        <div class="card-body bg-light p-4 rounded">
                            <div class="mb-3">
                                <strong>App Name:</strong> <span class="text-primary">{app_name}</span>
                            </div>
                            <div class="mb-3">
                                <strong>Company Name:</strong> <span class="text-success">{company_name}</span>
                            </div>
                            <div class="mb-3">
                                <strong>Employee Email:</strong> <a href="mailto:{payslip_email}" class="text-primary">{payslip_email}</a>
                            </div>
                            <div class="mb-3">
                                <strong>App URL:</strong> <a href="{app_url}" class="text-info" target="_blank">{app_url}</a>
                            </div>
                            <div class="mb-3">
                                <strong>Employee Name:</strong> <span class="text-secondary">{name}</span>
                            </div>
                            <div class="mb-3">
                                <strong>Salary Month:</strong> <span class="text-muted">{salary_month}</span>
                            </div>
                            <div class="mb-3">
                                <strong>URL:</strong> <a href="{url}" class="text-info" target="_blank">{url}</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Email Template Form Section -->
            <div class="col-md-12">
                <div class="card h-100">
                    <div class="card-header bg-white">
                        <h6 class="font-weight-bold mb-0">Email Template</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('company-email-template.update',$email->id)}}" accept-charset="UTF-8">
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
