@include('layouts.head')

<body>

    
	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="{{asset('assets/images/logo_light.png')}}" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
		</div>
	</div>
	<!-- /main navbar -->

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
