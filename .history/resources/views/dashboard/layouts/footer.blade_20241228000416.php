
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
