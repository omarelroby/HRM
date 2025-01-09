@extends('layouts.admin')

@section('page-title')
    {{ __('Manage Performance Type') }}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Department')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('performanceType.create') }}"
                    class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true"
                    data-title="{{ __('Create New Performance Type') }}">
                    <i class="fa fa-plus"></i> {{ __('Create') }}
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
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
