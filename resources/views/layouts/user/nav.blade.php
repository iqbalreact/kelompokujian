<header class="sticky-top navigation">
    <div class=container>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        {{-- <a class=navbar-brand href="index.html"><img class="img-fluid" src="{{asset('user/images/logo.png')}}" alt="godocs"></a> --}}
        <a class=navbar-brand href="{{url('/beranda')}}"><h4>Kelas TA Sipil</h4></a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
            <i class="ti-align-right h4 text-dark"></i></button>
        <div class="collapse navbar-collapse text-center" id=navigation>
            <ul class="navbar-nav mx-auto align-items-center">
            <li class="nav-item"><a class="nav-link" href="{{url('/beranda')}}">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/pengumuman')}}">Pengumuman</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Jadwal</a></li>
            </ul>
            {{-- <a href="changelog.html" class="btn btn-sm btn-outline-primary ml-lg-4">changelog</a> --}}
            {{-- <a href="contact.html" class="btn btn-sm btn-primary ml-lg-4">Lihat Kelas</a> --}}
        </div>
        </nav>
    </div>
</header>