@extends('dashboard.layouts.master')
@section('page-title')
    {{ __('Manage Training') }}
@endsection

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Employee')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addJobTitleModal" class="btn btn-primary">
                        <i class="fa fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            @endcan
        </div>
        <!-- Card for Training List -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Training List') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables" >
                            <thead>
                                <tr>
                                    <th>{{ __('Branch') }}</th>
                                    <th>{{ __('Full Name') }}</th>
                                    <th>{{ __('Contact') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    @if(Gate::check('Edit Trainer') || Gate::check('Delete Trainer') || Gate::check('Show Trainer'))
                                        <th width="3%">{{ __('Action') }}</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody class="font-style">
                                @foreach ($trainers as $trainer)
                                    <tr>
                                        <td>{{ !empty($trainer->branches) ? $trainer->branches->name : '' }}</td>
                                        <td>{{ $trainer->firstname . ' ' . $trainer->lastname }}</td>
                                        <td>{{ $trainer->contact }}</td>
                                        <td>{{ $trainer->email }}</td>
                                        @if (Gate::check('Edit Trainer') || Gate::check('Delete Trainer') || Gate::check('Show Trainer'))
                                            <td class="text-right action-btns">
                                                @can('Show Trainer')
                                                    <a href="#" data-url="{{ route('trainer.show', $trainer->id) }}"
                                                        data-size="lg" data-ajax-popup="true"
                                                        data-title="{{ __('Trainer Detail') }}" class="edit-icon btn btn-success bg-success"
                                                        data-toggle="tooltip"
                                                        data-original-title="{{ __('View Detail') }}"><i
                                                            class="fas fa-eye"></i></a>
                                                @endcan
                                                @can('Edit Trainer')
                                                    <a href="#" data-url="{{ route('trainer.edit', $trainer->id) }}"
                                                        data-size="lg" data-ajax-popup="true"
                                                        data-title="{{ __('Edit Trainer') }}" class="edit-icon btn btn-success"
                                                        data-toggle="tooltip" data-original-title="{{ __('Edit') }}"><i
                                                            class="fas fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Trainer')
                                                    <a href="#" class="delete-icon btn btn-danger"
                                                        data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                                        data-confirm-yes="document.getElementById('delete-form-{{ $trainer->id }}').submit();"
                                                        data-toggle="tooltip" data-original-title="{{ __('Delete') }}"><i
                                                            class="fas fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['trainer.destroy', $trainer->id], 'id' => 'delete-form-' . $trainer->id]) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- Add Training Modal -->
<div class="modal fade" id="addJobTitleModal" tabindex="-1" aria-labelledby="addJobTitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="addJobTitleModalLabel">{{ __('Add Training') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{Form::open(array('url'=>'trainer','method'=>'post'))}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('branch',__('Branch'),['class'=>'form-control-label'])}}
                            {{Form::select('branch',$branches,null,array('class'=>'form-control select2','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('firstname',__('First Name'),['class'=>'form-control-label'])}}
                            {{Form::text('firstname',null,array('class'=>'form-control','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('firstname_ar',__('First Name ar'),['class'=>'form-control-label'])}}
                            {{Form::text('firstname_ar',null,array('class'=>'form-control','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('lastname',__('Last Name'),['class'=>'form-control-label'])}}
                            {{Form::text('lastname',null,array('class'=>'form-control','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('lastname_ar',__('Last Name_ar'),['class'=>'form-control-label'])}}
                            {{Form::text('lastname_ar',null,array('class'=>'form-control','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('contact',__('Contact'),['class'=>'form-control-label'])}}
                            {{Form::text('contact',null,array('class'=>'form-control','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('email',__('Email'),['class'=>'form-control-label'])}}
                            {{Form::text('email',null,array('class'=>'form-control','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        {{Form::label('expertise',__('Expertise'),['class'=>'form-control-label'])}}
                        {{Form::textarea('expertise',null,array('class'=>'form-control','placeholder'=>__('Expertise')))}}
                    </div>
                    <div class="form-group col-lg-12">
                        {{Form::label('address',__('Address'),['class'=>'form-control-label'])}}
                        {{Form::textarea('address',null,array('class'=>'form-control','placeholder'=>__('Address')))}}
                    </div>
                    <div class="col-12">
                        <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                        <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                    </div>
                </div>
                {{Form::close()}}


                <script>
                    $(function () {
                        $(".gregorian-date , .datepicker").hijriDatePicker({
                        format:'YYYY-M-D',
                        showSwitcher: false,
                        hijri:false,
                        useCurrent: true,
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function () {
        $(".datepicker").hijriDatePicker({
            format: 'YYYY-M-D',
            showSwitcher: false,
            hijri: false,
            useCurrent: true
        });
    });
</script>
<script>
    // Optional: Submit form via AJAX for a smooth UX (No page reload)
    $('#createTrainingForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('#addTrainingModal').modal('hide');
                    location.reload(); // Refresh page to show the new Training
                } else {
                    alert(response.message); // Show error message if needed
                }
            },
            error: function() {
                alert('{{ __('Something went wrong. Please try again.') }}');
            }
        });
    });
</script>
@endsection
