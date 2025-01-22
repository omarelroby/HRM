@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Company Structures') }}
@endsection

<style>
    #chart-container {
    font-family: Arial;
    height: auto;

    border: 2px dashed #aaa;
    border-radius: 5px;
    overflow: auto;
    text-align: center;
    direction: ltr;
    }
    .page-wrapper .content {
        padding: 24px;
        padding-bottom: 0;
        min-height: calc(20vh - 105px);
    }
    .orgchart {
    background: #fff;
    }
    .orgchart td.left, .orgchart td.right, .orgchart td.top {
    border-color: #aaa;

    }
    .orgchart td>.down {
    background-color: #aaa;
    }
    .orgchart .middle-level .title {
    background-color: #006699;
    }
    .orgchart .middle-level .content {
    border-color: #006699;
    }
    .orgchart .product-dept .title {
    background-color: #009933;
    }
    .orgchart .product-dept .content {
    border-color: #009933;
    }
    .orgchart .rd-dept .title {
    background-color: #993366;
    }
    .orgchart .rd-dept .content {
    border-color: #993366;

    }
    .orgchart .pipeline1 .title {
    background-color: #996633;
    }
    .orgchart .pipeline1 .content {
    border-color: #996633;
    }
    .orgchart .frontend1 .title {
    background-color: #cc0066;
    }
    .orgchart .frontend1 .content {
    border-color: #cc0066;
    }

    #github-link {
    position: fixed;
    top: 0px;
    right: 10px;
    font-size: 3em;
    }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.1.1/css/jquery.orgchart.min.css" integrity="sha512-bCaZ8dJsDR+slK3QXmhjnPDREpFaClf3mihutFGH+RxkAcquLyd9iwewxWQuWuP5rumVRl7iGbSDuiTvjH1kLw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


@section('content')
    <style>
        .page-wrapper .content {

            min-height: calc(10vh - 105px);
        }

    </style>
    <div class="all-button-box row d-flex justify-content-end my-2">
        @can('Create Branch')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 my-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg"

                   data-title="{{__('Create New Structure')}}"

                >
                    <i class="fa fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        @endcan
    </div>

<div id="chart-container"></div>
    <div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-white">
                    <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Branch') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body" >
                    <input hidden="" value="{{$id}}" name="parent">

                    {{Form::open(array('url'=>'companystructure','method'=>'post'))}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('employee_id',__('Select The Employee'))}}
                                {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2', 'id'=>'parent'))}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('parent',__('Select The Parent'))}}
                                {{Form::select('parent',$structure_tree,null,array('class'=>'form-control select2', 'id'=>'parent'))}}
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                                {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name')))}}
                                @error('name')
                                <span class="invalid-name" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                {{Form::label('name_ar',__('Name_ar'),['class'=>'form-control-label'])}}
                                {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Name arabic')))}}
                                @error('name_ar')
                                <span class="invalid-name" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 my-2">
                            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>

                        </div>
                    </div>
                    {{Form::close()}}

                </div>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.1.1/js/jquery.orgchart.min.js"
            integrity="sha512-alnBKIRc2t6LkXj07dy2CLCByKoMYf2eQ5hLpDmjoqO44d3JF8LSM4PptrgvohTQT0LzKdRasI/wgLN0ONNgmA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        console.log(@json($CompanyStructures));
        'use strict';
        (function($){
            $(function() {
                var datascource = {
                    'name': '<?php echo $parentTree['name'.$lang] ?>',
                    'title': '',

                    'children':@json($CompanyStructures)
                };

                var oc = $('#chart-container').orgchart({
                    'data' : datascource,
                    'nodeContent': 'title'
                });
            });
        })(jQuery);
    </script>
@endpush
