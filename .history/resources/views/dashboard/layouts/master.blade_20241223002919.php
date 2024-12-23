 
@include('dashboard.layouts.header') 
	@include('dashboard.layouts.sidebar')
    @yield('css')
    @yield('content')
    @yield('scirpt')
 
    @include('dashboard.layouts.footer')
	