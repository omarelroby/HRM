@extends('layouts.language')

@section('page-title')
    {{ __('Company Structures') }}
@endsection

<style>
    #chart-container {
    font-family: Arial;
    height: 420px;
    border: 2px dashed #aaa;
    border-radius: 5px;
    overflow: auto;
    text-align: center;
    direction: ltr;
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

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Branch')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('companystructure.create') }}?id={{ $segment }}"
                    class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true"
                    @if ($segment) data-title="{{ __('Create New position') }}"
                @else
                data-title="{{ __('Create New Structure') }}" @endif>
                    <i class="fa fa-plus"></i> {{ __('Create') }}
                </a>
            </div>
        @endcan
    </div>
@endsection

@section('content')

<div id="chart-container"></div>

@push('script-page')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.1.1/js/jquery.orgchart.min.js" 
    integrity="sha512-alnBKIRc2t6LkXj07dy2CLCByKoMYf2eQ5hLpDmjoqO44d3JF8LSM4PptrgvohTQT0LzKdRasI/wgLN0ONNgmA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
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
@endsection
