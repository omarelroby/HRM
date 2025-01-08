@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="mb-0">{{ __('Update Custom Question') }}</h5>
                </div>
                <div class="card-body">
                    {{Form::model($companyPolicy,array('route' => array('company-policy.update', $companyPolicy->id), 'method' => 'PUT','enctype' => "multipart/form-data")) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('branch',__('Branch'),['class'=>'form-control-label'])}}
                                {{Form::select('branch',$branch,null,array('class'=>'form-control select2','required'=>'required'))}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('title',__('Title'),['class'=>'form-control-label'])}}
                                {{Form::text('title',null,array('class'=>'form-control','required'=>'required'))}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('title_ar',__('Title_ar'),['class'=>'form-control-label'])}}
                                {{Form::text('title_ar',null,array('class'=>'form-control','required'=>'required'))}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('description', __('Description'),['class'=>'form-control-label'])}}
                                {{ Form::textarea('description',null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                          <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('description_ar', __('Description_ar'),['class'=>'form-control-label'])}}
                                {{ Form::textarea('description_ar',null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            {{Form::label('attachment',__('Attachment'),['class'=>'form-control-label'])}}
                            <div class="choose-file form-group">
                                <label for="attachment" class="form-control-label">
                                    <div>{{__('Choose file here')}}</div>
                                    <input type="file" class="form-control" name="attachment" id="attachment" data-filename="attachment_create">
                                </label>
                                <p class="attachment_create"></p>
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

    <!-- Datepicker Script -->
    <script>
        $(function () {
            $(".datepicker").hijriDatePicker({
                format: 'YYYY-M-D',
                showSwitcher: false,
                hijri: false,
                useCurrent: true,
            });
        });
    </script>
@endsection
