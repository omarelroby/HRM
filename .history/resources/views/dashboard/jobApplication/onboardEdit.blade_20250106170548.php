@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ __('Update Job On Board') }}</h5>
                </div>
                <div class="card-body">
                    {{ Form::model($jobOnBoard, ['route' => ['job.on.board.update', $jobOnBoard->id], 'method' => 'post', 'class' => 'needs-validation', 'novalidate']) }}
                    <div class="row">
                        <div class="form-group col-md-12 mb-3">
                            {{ Form::label('joining_date', __('Joining Date'), ['class' => 'form-label']) }}
                            {{ Form::text('joining_date', null, ['class' => 'form-control datepicker', 'required' => 'required']) }}
                            <div class="invalid-feedback">{{ __('Please provide a valid joining date.') }}</div>
                        </div>
                     
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                    {{ Form::close() }}
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
