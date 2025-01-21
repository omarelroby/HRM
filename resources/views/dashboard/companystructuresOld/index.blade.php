@extends('layouts.admin')

@section('page-title')
    {{__('Company Structures')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Branch')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('companystructure.create') }}?id={{$segment}}"
                class="btn btn-primary btn-icon-only width-auto"
                data-ajax-popup="true"
                @if($segment)
                data-title="{{__('Create New position')}}"
                @else
                data-title="{{__('Create New Structure')}}"
                @endif
                >
                    <i class="fa fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        @endcan
    </div>
@endsection

@section('content')

@endsection

