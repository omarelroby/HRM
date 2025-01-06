@extends('layouts.admin')
@section('page-title')
    {{__('Manage Job')}}
@endsection
@push('script-page')
    <script>

        $('.copy_link').click(function (e) {
            e.preventDefault();
            var copyText = $(this).attr('href');

            document.addEventListener('copy', function (e) {
                e.clipboardData.setData('text/plain', copyText);
                e.preventDefault();
            }, true);

            document.execCommand('copy');
            show_toastr('Success', 'Url copied to clipboard', 'success');
        });
    </script>
@endpush
@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Job')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="{{ route('job.create') }}" class="btn btn-primary btn-icon-only width-auto" data-title="{{__('Create New Job')}}">
                    <i class="fa fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        @endcan
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="card card-box">
                <div class="left-card">
                    <div class="icon-box"><i class="fa fa-users"></i></div>
                    <h4>{{__('Total Jobs')}}</h4>
                </div>
                <div class="number-icon">{{$data['total']}}</div>
            </div>

        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="card card-box">
                <div class="left-card">
                    <div class="icon-box green-bg"><i class="fa fa-tag"></i></div>
                    <h4>{{__('Active Jobs')}}</h4>
                </div>
                <div class="number-icon">{{$data['active']}}</div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="card card-box">
                <div class="left-card">
                    <div class="icon-box red-bg"><i class="fa fa-money-bill"></i></div>
                    <h4>{{__('Inactive Jobs')}}</h4>
                </div>
                <div class="number-icon">{{$data['in_active']}}</div>
            </div>

        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body py-0">
                    <div class="table-responsive">
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

