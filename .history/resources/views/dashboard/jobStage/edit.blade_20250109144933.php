@extends('dashboard.layouts.master')


@section('content')
    <div class="row">
        <!-- Card for Company Policy Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <!-- Card Header -->
                <div class="card-header  text-white">
                    <h5 class="mb-0">{{ __('Update job Category') }}</h5>
                </div>

                <!-- Card Body -->
                <div class="card-body">



                    <div class="card bg-none card-box">
                        {{ Form::model($jobStage, array('route' => array('job-stage.update', $jobStage->id), 'method' => 'PUT')) }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('title',__('Title'),['class'=>'form-control-label'])}}
                                    {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter stage title')))}}
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('title_ar',__('Title_ar'),['class'=>'form-control-label'])}}
                                    {{Form::text('title_ar',null,array('class'=>'form-control','placeholder'=>__('Enter stage title arabic')))}}
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
                                <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                            </div>
                        </div>
                        {{Form::close()}}









                    </div>





                </div>
            </div>
        </div>
    </div>

    <!-- Script to display selected file name -->
    <script>
        document.getElementById('attachment').addEventListener('change', function (e) {
            const fileName = e.target.files[0]?.name || '{{ __('No file chosen') }}';
            document.getElementById('attachmentFileName').textContent = '{{ __('Selected file:') }} ' + fileName;
        });
    </script>
@endsection
