@include('layouts.head')

<body>

    @include('layouts.nav')

    @yield('page-head')


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

            @yield('content')

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	@include('layouts.footer')
	
</body>
</html>
