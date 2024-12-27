<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.8/dist/umd/popper.min.js"></script>

<!-- Feather Icon JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/feather.min.js"></script>

<!-- Slimscroll JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/jquery.slimscroll.min.js"></script>

<!-- Datatable JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/jquery.dataTables.min.js"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/dataTables.bootstrap5.min.js"></script>

<!-- Daterangepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-hijri/1.1.2/moment-hijri.min.js"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="{{ asset('assets/js/bootstrap-hijri-datetimepicker.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap-hijri-datetimepicker.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-hijri-datepicker.js') }}"></script>

<!-- Select2 JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/select2/js/select2.min.js"></script>

<!-- Chart JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/apexchart/chart-data.js"></script>

<!-- Custom JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/theme-colorpicker.js"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/script.js"></script>

<!-- Summernote JS -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/plugins/summernote/summernote-lite.min.js"></script>

<!-- Miscellaneous -->
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/circle-progress.js"></script>
<script src="https://smarthr.dreamstechnologies.com/html/template/assets/js/todo.js"></script>

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
