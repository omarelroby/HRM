@extends('dashboard.layouts.master')
@section('page-title')
    {{__('Manage Archive Application')}}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">{{ __('Last Login Details') }}</h5>
                <div>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Refresh">
                        <i class="ti ti-refresh"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


