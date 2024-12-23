@extends('layouts.admin')
@section('page-title')
    {{__('Dashboard')}}
@endsection

@push('css-page')
    <link rel="stylesheet" href="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.css') }}">

    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/morris/morris.css')}}">

@endpush

@section('content')

    @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if(\Auth::user()->type == 'employee' && $companyslate && \Auth::user()->company_slate_readed != 1)
        <div class="row">
            <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div style="height:500px;" class="modal-content">
                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <h3> {{$companyslate['title'.$lang]}} </h3>
                        </div>

                        <div class="modal-body">
                            <embed
                                src="{{asset(Storage::url($companyslate['file'.$lang]))}}#toolbar=0&navpanes=0&scrollbar=0"
                                type="application/pdf"
                                frameBorder="0"
                                scrolling="auto"
                                height="100%"
                                width="100%">
                            </embed>
                        </div>

                        <div class="modal-footer">
                            <a style="color:#fff;" target="__blank" class="col-md-4 btn btn-success" href="{{asset(Storage::url($companyslate['file'.$lang]))}}"> <i class="fa fa-eye" aria-hidden="true"></i> {{__('Preview')}}</a>
                            <a style="color:#fff;"  class="col-md-4 btn btn-info" href="{{asset(Storage::url($companyslate['file'.$lang]))}}" download> <i class="fa fa-download" aria-hidden="true"></i> {{__('Download')}}</a>

                            {!! Form::open(['method' => 'POST', 'class' => 'col-md-4', 'route' => ['companyslate.accept'] ]) !!}
                                <button style="width:100%;" type="submit"  class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> {{__('Accept')}}</button>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
 
@endpush

