@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

{{-- <script data-cfasync="false" src="https://smarthr.dreamstechnologies.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
<script src="{{ asset('public/assets/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>

<!-- Bootstrap Core JS -->
<!-- Feather Icon JS -->
<script src="{{ asset('public/assets/js/feather.min.js') }}" type="text/javascript"></script>

<!-- Slimscroll JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>

<!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> <!-- DataTables -->
<script
    src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> <!-- DataTables with Bootstrap 5 -->

<!-- Daterangepicker JS -->
<script src="{{ asset('public/assets/js/moment.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

<!-- Select2 JS -->
<script src="{{ asset('public/assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

<!-- Chart JS -->
<script src="{{ asset('public/assets/plugins/apexchart/apexcharts.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/apexchart/chart-data.js') }}" type="text/javascript"></script>

<!-- Custom JS -->
<script src="{{ asset('public/assets/js/script.js')}} " type="text/javascript"></script>
<script src="{{ asset('public/assets/js/bootstrap-hijri-datepicker.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('public/assets/plugins/apexchart/apexcharts.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/apexchart/chart-data.js') }}" type="text/javascript"></script>

<!-- Custom JS -->
<script src="{{ asset('public/assets/js/theme-colorpicker.js') }}"></script>


<!-- Chart JS -->
<script src="{{ asset('public/assets/plugins/apexchart/apexcharts.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/apexchart/chart-data.js') }}" type="text/javascript"></script>

<!-- Additional Custom JS -->
<script src="{{ asset('public/assets/plugins/apexchart/apexcharts.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/plugins/apexchart/chart-data.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/js/bootstrap-hijri-datepicker.js') }}"></script>
<script src="{{ asset('public/assets/plugins/summernote/summernote-lite.min.js') }}"
        type="text/javascript"></script>

<script src="{{ asset('public/assets/dashboard/js/circle-progress.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/dashboard/js/todo.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/dashboard/cdn/cloudflare-poppor.min.js') }}"></script>
<script src="{{ asset('public/assets/dashboard/cdn/cloudflare-moment.min.js') }}"></script>
<script src="{{ asset('public/assets/dashboard/cdn/cloudflare-moment-with-locales-min.js') }}"></script>
<script src="{{ 'public/assets/dashboard/cdn/popper.min.js' }}"></script>

<!-- Hijri Moment.js -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.17.0/moment-hijri.min.js"></script>
<script src="{{ asset('public/assets/plugins/chartjs/chart.min.js') }}"></script>
{{--<script src="{{ asset('public/assets/plugins/chartjs/chart-data.js') }}"></script>--}}
<script>
    $(document).ready(function () {
        $('#sidebar-menu').slimScroll({
            height: 'auto', // or set a specific height
            position: 'right',
            size: "5px",
            color: '#ccc',
            wheelStep: 10,
            touchScrollStep: 100
        });
    });
    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}', "@lang('efb.missing_or_wrong_data')", {iconClass: "bg-danger"});
    @endforeach
        @endif
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": false
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(Session::has('wrong'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": false
        }
    toastr.error("{{ session('wrong') }}", '', {iconClass: "bg-danger"});
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
<script>
    $(document).ready(function () {
        // Ensure that the dropdown is closed when the page reloads
        // $('.submenu > ul').hide(); // Hide the submenu on page load
        $('.submenu > a').removeClass('subdrop'); // Remove the 'subdrop' class initially

        // Handle the click event to toggle the dropdown
        $('.submenu > a').click(function (e) {
            e.preventDefault(); // Prevent default link behavior

            var $submenu = $(this).next('ul'); // Get the next 'ul' (the submenu)

            // Toggle the visibility of the submenu with animation
            if ($submenu.is(':visible')) {
                $submenu.slideUp(500); // Slide up with 500ms duration
                $(this).removeClass('subdrop'); // Optionally remove the 'subdrop' class to change the icon
            } else {
                $submenu.slideDown(500); // Slide down with 500ms duration
                $(this).addClass('subdrop'); // Optionally add the 'subdrop' class to change the icon
            }
        });
    });

</script>
<script src="{{ asset('public/assets/dashboard/cdn/rocket-loader.min.js') }}"
        data-cf-settings="cb90688a5d83b208bb3c117a-|49" defer></script>

<!-- Hijri DatePicker Styles -->
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css">

<!-- Moment.js with Hijri support -->
<script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.17.0/moment-hijri.min.js"></script>

<!-- Hijri DatePicker Script -->
<script
    src="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>

<!-- Your HTML content -->

<!-- Bootstrap Hijri Datepicker JS -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-hijri-datepicker/1.0.7/js/bootstrap-hijri-datepicker.min.js"></script>
<!-- Scripts -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('public/assets/js/bootstrap-hijri-datetimepicker.js') }}"></script>

<script src="{{ asset('public/assets/js/bootstrap-hijri-datepicker.js') }}"></script>

<script type="text/javascript">
    function changeLanguage() {
        var lang = document.getElementById("langSwitcher").value;
        window.location.href = lang;
    }

</script>

</body>
</html>


<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/employee-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Dec 2024 18:38:21 GMT -->
