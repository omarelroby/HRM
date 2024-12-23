 
@include('dashboard.layouts.header')
 
	@include('dashboard.layouts.sidebar')
    @yield('css')
    @yield('content')
    @yield('scirpt')
	</div>
	<!-- /Main Wrapper -->
    @include('dashboard.layouts.footer')
	