
	<!-- jQuery -->
<script data-cfasync="false" src="https://smarthr.dreamstechnologies.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>

<!-- Bootstrap Core JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>

<!-- Feather Icon JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/feather.min.js" type="text/javascript"></script>

<!-- Slimscroll JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>

<!-- Color Picker JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/@simonwep/pickr/pickr.es5.min.js" type="text/javascript"></script>

<!-- Datatable JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>

<!-- Daterangepicker JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/moment.js" type="text/javascript"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<!-- Select2 JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

<!-- Chart JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/apexchart/apexcharts.min.js" type="text/javascript"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/apexchart/chart-data.js" type="text/javascript"></script>

<!-- Custom JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/theme-colorpicker.js" type="text/javascript"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/script.js" type="text/javascript"></script>

<!-- Additional Custom JS -->
<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-hijri-datetimepicker.js')}}" type="text/javascript"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/summernote/summernote-lite.min.js" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/@simonwep/pickr/pickr.es5.min.js') }}" type="text/javascript"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/circle-progress.js" type="text/javascript"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/todo.js" type="text/javascript"></script>
<script>
    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}', "@lang('efb.missing_or_wrong_data')", {iconClass:"bg-danger"});
    @endforeach
    @endif
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : false
        }
    toastr.success("{{ session('message') }}");
    @endif

            @if(Session::has('wrong'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : false
        }
    toastr.error("{{ session('wrong') }}", '', {iconClass:"bg-danger"});
    @endif

            @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

            @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
<script src="https://smarthr.dreamstechnologies.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="12789c3eb65f5dda020bae43-|49" defer></script>
</body>
    <script type="text/javascript">
        function changeLanguage() {
            var lang = document.getElementById("langSwitcher").value;
            window.location.href = lang;
        }
    </script>

<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/employee-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Dec 2024 18:38:21 GMT -->
