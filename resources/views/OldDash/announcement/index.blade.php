@extends('layouts.admin')

@section('page-title')
    {{__('Manage Announcement')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Announcement')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="#" data-url="{{ route('announcement.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Announcement')}}">
                <i class="fa fa-plus"></i> {{__('Create')}}
            </a>
            </div>
        @endcan
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5></h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables" >
                            <thead>
                                <tr>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Start Date')}}</th>
                                    <th>{{__('End Date')}}</th>
                                    <th>{{__('description')}}</th>
                                    @if(Gate::check('Edit Announcement') || Gate::check('Delete Announcement'))
                                        <th width="3%">{{ __('Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($announcements as $announcement)
                                    <tr>
                                        <td>{{ $announcement->title }}</td>
                                        <td>{{  \Auth::user()->dateFormat($announcement->start_date) }}</td>
                                        <td>{{  \Auth::user()->dateFormat($announcement->end_date) }}</td>
                                        <td>{{ $announcement->description }}</td>
                                        @if(Gate::check('Edit Announcement') || Gate::check('Delete Announcement'))
                                            <td class="text-right action-btns">
                                                @can('Edit Announcement')
                                                    <a href="#" data-url="{{ URL::to('announcement/'.$announcement->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Announcement')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Announcement')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$announcement->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['announcement.destroy', $announcement->id],'id'=>'delete-form-'.$announcement->id]) !!}
                                                    {!! Form::close() !!}
                                                @endif
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

@endsection

@push('script-page')
    <script>

        //Branch Wise Deapartment Get
        $(document).ready(function () {
            var b_id = $('#branch_id').val();
            getDepartment(b_id);
        });

        $(document).on('change', 'select[name=branch_id]', function () {
            var branch_id = $(this).val();
            getDepartment(branch_id);
        });

        function getDepartment(bid) {

            $.ajax({
                url: '{{route('announcement.getdepartment')}}',
                type: 'POST',
                data: {
                    "branch_id": bid, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    console.log(data);
                    $('#department_id').empty();
                    $('#department_id').append('<option value="">{{__('Select Department')}}</option>');

                    $('#department_id').append('<option value="0"> {{__('All Department')}} </option>');
                    $.each(data, function (key, value) {
                        $('#department_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }

        $(document).on('change', '#department_id', function () {
            var department_id = $(this).val();
            getEmployee(department_id);
        });

        function getEmployee(did) {

            $.ajax({
                url: '{{route('announcement.getemployee')}}',
                type: 'POST',
                data: {
                    "department_id": did, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {

                    $('#employee_id').empty();
                    $('#employee_id').append('<option value="">{{__('Select Employee')}}</option>');
                    $('#employee_id').append('<option value="0"> {{__('All Employee')}} </option>');

                    $.each(data, function (key, value) {
                        $('#employee_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
    </script>
@endpush
