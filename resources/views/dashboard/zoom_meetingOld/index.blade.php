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
