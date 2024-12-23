@php
$logo = asset(Storage::url('uploads/logo/'));
$company_favicon = Utility::getValByName('company_favicon');
@endphp
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            {{ Utility::getValByName('title_text') ? Utility::getValByName('title_text') : config('app.name', 'HRMGo') }}
            - @yield('page-title')
        </title>
        <link rel="icon" href="{{ $logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png') }}" type="image" sizes="16x16">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

        <!-- Toastr style -->
        <link href="{{ asset('admin/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

        <!-- Gritter -->
        <link href=" {{ asset('admin/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">
        
        <!-- datatables -->
        <link href="{{asset('admin/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

        <!-- form wizared -->
        <link href="{{asset('admin/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">

        <!-- select2 -->
        <link href="{{asset('admin/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/plugins/select2/select2-bootstrap4.min.css')}}" rel="stylesheet">

        <link href="{{asset('admin/css/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/plugins/fullcalendar/fullcalendar.print.css')}}" rel='stylesheet' media='print'>

        <link href="{{ asset('admin/css/animate.css')}}" rel="stylesheet">
        <link href="{{ asset('admin/css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" />

        @if(env('SITE_RTL') == 'on' || app()->getLocale() == "ar")
            <link href="{{ asset('admin/css/styleRtl.css')}} " rel="stylesheet">
            <link href="{{ asset('admin/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
        @endif

    </head>

    <style>
        .row{
            padding:1%;
        }

        .wizard > .steps > ul > li{
            width:20%;
        }

        .fieldset{
            width:100%;
        }
    </style>
    
    <body>
        <div id="wrapper">
            @include('partial.Admin.menu')

            <div id="page-wrapper" class="gray-bg dashbard-1">
                @include('partial.Admin.header')
                @yield('action-button')
                @yield('content')
            </div>

            <!-- Toast notifications -->
            @if($message = Session::get('success'))
                <div id="toast_notification">
                    <div class="toast toast1 toast-bootstrap @if($message = Session::get('success')) alert-success @else alert-danger @endif" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="toast-body">
                            {!! $message !!}
                        </div>
                    </div>
                </div>
            @endif

            @if($messageee = Session::get('error'))
                <div id="toast_notification">
                    <div class="toast toast1 toast-bootstrap alert-danger" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="toast-body">
                            {!! $messageee !!}
                        </div>
                    </div>
                </div>
            @endif

            <div class="modal inmodal" id="commonModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="exampleModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Mainly scripts -->
        <script src="{{ asset('admin/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{ asset('admin/js/popper.min.js')}} "></script>
        <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('admin/js/bootstrap.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

        <!-- datatables -->
        <script src="{{asset('admin/js/plugins/dataTables/datatables.min.js')}}"></script>

        <!-- Flot -->
        <script src="{{ asset('admin/js/plugins/flot/jquery.flot.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/flot/jquery.flot.spline.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/flot/jquery.flot.pie.js')}}"></script>

        <!-- Peity -->
        <script src="{{ asset('admin/js/plugins/peity/jquery.peity.min.js')}}"></script>
        <script src="{{ asset('admin/js/demo/peity-demo.js')}}"></script>

        <!-- Custom and plugin javascript -->
        <script src="{{ asset('admin/js/inspinia.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/pace/pace.min.js')}}"></script>

        <!-- Steps -->
        <script src="{{asset('admin/js/plugins/steps/jquery.steps.min.js')}}"></script>

        <!-- Jquery Validate -->
        <script src="{{asset('admin/js/plugins/validate/jquery.validate.min.js')}}"></script>

        <!-- jQuery UI -->
        <script src="{{ asset('admin/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

        <!-- GITTER -->
        <script src="{{ asset('admin/js/plugins/gritter/jquery.gritter.min.js')}}"></script>

        <!-- Sparkline -->
        <script src="{{ asset('admin/js/plugins/sparkline/jquery.sparkline.min.js')}} "></script>

        <!-- Sparkline demo data  -->
        <script src="{{ asset('admin/js/demo/sparkline-demo.js')}} "></script>

        <!-- ChartJS-->
        <script src="{{ asset('admin/js/plugins/chartJs/Chart.min.js')}} "></script>

        <!-- Select2 -->
        <script src="{{asset('admin/js/plugins/select2/select2.full.min.js')}}"></script>

        <!-- Full Calendar -->
        <script src="{{asset('admin/js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>

        <!-- Toastr -->
        <script src="{{ asset('admin/js/plugins/toastr/toastr.min.js')}} "></script>
        <script src="{{asset('assets/js/bootstrap-hijri-datepicker.js')}}"></script>

        <script src="{{ asset('js/custom.js') }}"></script>

        <script>
            $(document).ready(function() {

                let toast = $('.toast');

                setTimeout(function() {
                    toast.toast({
                        delay: 5000,
                        animation: true
                    });
                    toast.toast('show');

                }, 2200);
            });

            $(window).bind("scroll", function () {
                let toast = $('.toast');
                toast.css("top", window.pageYOffset + 20);
            });

            // Upgrade button class name
            $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

            $(document).ready(function(){
                $('.dataTables').DataTable({
                    pageLength: 25,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                        { extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},

                        {extend: 'print',
                        customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                        }
                        }
                    ]

                });
            });

            $(function () {
                $(".gregorian-date , .datepicker").hijriDatePicker({
                format:'YYYY-M-D',
                showSwitcher: false,
                hijri:false,
                useCurrent: true,
                });
            });

            $(function () {
                $(".hijri-date-input , .datepicker").hijriDatePicker({
                hijriFormat:'iYYYY-iM-iD',
                showSwitcher: true,
                hijri:true,
                useCurrent: true,
                });
            });

            for(let i = 1; i <= 18; i++){
            $('#hijri_'+i).on('dp.change', function (arg) {

                if (!arg.date) {
                return;
                };

                let date = arg.date;
                $('#gregorian_'+i).val(date.format("YYYY-M-D"));
            });
            
            $('#gregorian_'+i).on('dp.change', function (arg) {

                if (!arg.date) {
                return;
                };

                let date = arg.date;
                $('#hijri_'+i).val(date.format("iYYYY-iM-iD"));
            });
            }

            // $(".select2").select2({
            //     theme: 'bootstrap4',
            // });
        </script>

        @stack('script-page')
    </body>
</html>
