@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Update Company Policy') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Company Policy Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <!-- Card Header -->
                <div class="card-header  text-white">
                    <h5 class="mb-0">{{ __('Update loan option') }}</h5>
                </div>

                <!-- Card Body -->
                <div class="card-body">



                    <div class="card bg-none card-box">
                        {{Form::model($leavetype,array('route' => array('leavetype.update', $leavetype->id), 'method' => 'PUT')) }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('title',__('Leave Type'),['class'=>'form-control-label'])}}
                                    {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Leave Type Name')))}}
                                    @error('title')
                                    <span class="invalid-name" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('title_ar',__('Leave Type_ar'),['class'=>'form-control-label'])}}
                                    {{Form::text('title_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Leave Type Name arabic')))}}
                                    @error('title_ar')
                                    <span class="invalid-name" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('days',__('Days Per Year'),['class'=>'form-control-label'])}}
                                    {{Form::number('days',null,array('class'=>'form-control','placeholder'=>__('Enter Days / Year')))}}
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
