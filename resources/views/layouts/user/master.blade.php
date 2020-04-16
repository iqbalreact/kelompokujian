
@include('layouts.user.head')

<body>

@include('layouts.user.nav')


@yield('content')


@include('layouts.user.footer')

<!-- plugins -->
<script src="{{asset('user/plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{asset('user/plugins/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('user/plugins/masonry/masonry.min.js')}}"></script>
<script src="{{asset('user/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('user/plugins/match-height/jquery.matchHeight-min.js')}}"></script>

<!-- Main Script -->
<script src="{{asset('user/js/script.js')}}"></script>

</body>

</html>