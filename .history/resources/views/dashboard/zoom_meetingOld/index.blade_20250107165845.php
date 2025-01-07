@extends('layouts.admin')

@section('page-title')
    {{ __('Zoom Meeting') }}
@endsection

<style>
    .ranges {
        display: none;
    }

</style>


@section('action-button')

    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 col-12">
        <div class="all-button-box">
            <a href="{{ route('zoom_meeting.calender') }}" class="btn btn-primary btn-icon-only width-auto"><i
                    class="far fa-calendar-alt"></i> {{ __('Calendar View') }} </a>
        </div>
    </div>

    @if (\Auth::user()->type == 'company')
        <a href="#" data-url="{{ route('zoom-meeting.create') }}" data-size="xl" data-ajax-popup="true"
            data-title="{{ __('Create New Zoom Meeting') }}" class="btn btn-primary btn-icon-only width-auto">
            <i class="fa fa-plus"></i> {{ __('Create') }}
        </a>
    @endif

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
                              
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('script-page')
    <script>
        function ddatetime_range() {
            $('.datetime_class_start_date').daterangepicker({
                "singleDatePicker": true,
                "timePicker": true,
                "autoApply": false,
                "locale": {
                    "format": 'YYYY-MM-DD H:mm'
                },
                "timePicker24Hour": true,
            }, function(start, end, label) {
                $('.start_date').val(start.format('YYYY-MM-DD H:mm'));
            });
        }
    </script>
@endpush
