@extends('dashboard.layouts.master')
@section('page-title')
    {{__('Manage Indicator')}}
@endsection
 
@section('script')
    <script src="{{ asset('js/bootstrap-toggle.js') }}"></script>

    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
            $("fieldset[id^='demo'] .stars").click(function () {
                alert($(this).val());
                $(this).attr("checked");
            });
        });

        $(document).ready(function () {
            var d_id = $('#department_id').val();
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department]', function () {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        function getDesignation(did) {
            $.ajax({
                url: '{{route('employee.json')}}',
                type: 'POST',
                data: {
                    "department_id": did, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('#designation_id').empty();
                    $('#designation_id').append('<option value="">{{__('Select Designation')}}</option>');
                    $.each(data, function (key, value) {
                        $('#designation_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
    </script>
@endpush

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Indicator')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('indicator.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Indicator')}}">
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
                                    <th>{{__('Branch')}}</th>
                                    <th>{{__('Department')}}</th>
                                    <th>{{__('Designation')}}</th>
                                    <th>{{__('Overall Rating')}}</th>
                                    <th>{{__('Added By')}}</th>
                                    <th>{{__('Created At')}}</th>
                                    @if( Gate::check('Edit Indicator') ||Gate::check('Delete Indicator') ||Gate::check('Show Indicator'))
                                        <th width="3%">{{__('Action')}}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($indicators as $indicator)
                                    @php
                                        if(!empty($indicator->rating)){
                                            $rating = json_decode($indicator->rating,true);
                                        if(!empty($rating)){
                                                $starsum = array_sum($rating);
                                                $overallrating = $starsum/count($rating);
                                            }else{
                                                $overallrating = 0;
                                            }
                                        }
                                        else{
                                            $overallrating = 0;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ !empty($indicator->branches)?$indicator->branches->name:'' }}</td>
                                        <td>{{ !empty($indicator->departments)?$indicator->departments->name:'' }}</td>
                                        <td>{{ !empty($indicator->designations)?$indicator->designations->name:'' }}</td>
                                        <td>

                                            @for($i=1; $i<=5; $i++)
                                                @if($overallrating < $i)
                                                    @if(is_float($overallrating) && (round($overallrating) == $i))
                                                        <i class="text-warning fa fa-star-half-alt"></i>
                                                    @else
                                                        <i class="fa fa-star"></i>
                                                    @endif
                                                @else
                                                    <i class="text-warning fa fa-star"></i>
                                                @endif
                                            @endfor
                                            <span class="theme-text-color">({{number_format($overallrating,1)}})</span>
                                        </td>
                                        <td>{{ !empty($indicator->user)?$indicator->user->name:'' }}</td>
                                        <td>{{ \Auth::user()->dateFormat($indicator->created_at) }}</td>
                                        @if( Gate::check('Edit Indicator') ||Gate::check('Delete Indicator') || Gate::check('Show Indicator'))
                                            <td class="text-right action-btns">
                                                @can('Show Indicator')
                                                    <a href="#" data-url="{{ route('indicator.show',$indicator->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Indicator Detail')}}" class="edit-icon btn btn-success bg-success" data-toggle="tooltip" data-original-title="{{__('View Detail')}}"><i class="fa fa-eye"></i></a>
                                                @endcan
                                                @can('Edit Indicator')
                                                    <a href="#" data-url="{{ route('indicator.edit',$indicator->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Indicator')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Indicator')
                                                    <a href="#" class="delete-icon btn btn-danger" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$indicator->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['indicator.destroy', $indicator->id],'id'=>'delete-form-'.$indicator->id]) !!}
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
@endsection



