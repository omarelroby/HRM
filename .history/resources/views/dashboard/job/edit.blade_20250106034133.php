@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job') }}
@endsection

@section('content')

    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Update Job') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

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
@endsection





