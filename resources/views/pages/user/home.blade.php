@extends('layouts.user.master')

@section('title')
    Kelas Tugas Akhir Sipil - UNTAN
@endsection

@section('content')
    <!-- banner -->
<section class="section pb-0">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-7 text-center text-lg-left">
          <h3 class="mb-4">Kelas Tugas Akhir Teknik Sipil Universitas Tanjungpura</h3>
          <p class="mb-4">Lorem ipsum dolor amet, consetetur sadiffspscing elitr, diam nonumy invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua At.</p>
        <a href="{{url('/kelas')}}"><button type="submit" class="btn btn-primary">Cari Kelas Kamu</button></a>
        </div>
        <div class="col-lg-4 d-lg-block d-none">
          <img src="{{asset('user/images/banner.jpg')}}" alt="illustration" class="img-fluid">
        </div>
      </div>
    </div>
</section>
  <!-- /banner -->
  
  <!-- topics -->
<section class="section pb-0">
    <div class="container">
      <h3 class="section-title">Daftar Kelompok Keahlian</h3>
      <div class="row">
        <!-- topic -->
        <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
          <div class="card match-height">
            <div class="card-body">
              <i class="card-icon ti-panel mb-4"></i>
              <h3 class="card-title h4">Manajemen Rekayasa Konstruksi</h3>
              <p class="card-text">Cras at dolor eget urna varius faucibus tempus in elit dolor sit amet.</p>
              <a href="{{url('/kelas')}}" class="stretched-link"></a>
            </div>
          </div>
        </div>
        <!-- topic -->
        <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
          <div class="card match-height">
            <div class="card-body">
              <i class="card-icon ti-credit-card mb-4"></i>
              <h3 class="card-title h4">Rekayasa Transportasi</h3>
              <p class="card-text">Cras at dolor eget urna varius faucibus tempus in elit dolor sit amet.</p>
              <a href="{{url('/kelas')}}" class="stretched-link"></a>
            </div>
          </div>
        </div>
        <!-- topic -->
        <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
          <div class="card match-height">
            <div class="card-body">
              <i class="card-icon ti-package mb-4"></i>
              <h3 class="card-title h4">Geoteknik</h3>
              <p class="card-text">Cras at dolor eget urna varius faucibus tempus in elit dolor sit amet.</p>
              <a href="{{url('/kelas')}}" class="stretched-link"></a>
            </div>
          </div>
        </div>
        <!-- topic -->
        <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
          <div class="card match-height">
            <div class="card-body">
              <i class="card-icon ti-settings mb-4"></i>
              <h5 class="card-title h4">Teknik Sumber Daya Air</h5>
              <p class="card-text">Cras at dolor eget urna varius faucibus tempus in elit dolor sit amet.</p>
              <a href="{{url('/kelas')}}" class="stretched-link"></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
          <div class="card match-height">
            <div class="card-body">
              <i class="card-icon ti-settings mb-4"></i>
              <h5 class="card-title h4">Struktur</h5>
              <p class="card-text">Cras at dolor eget urna varius faucibus tempus in elit dolor sit amet.</p>
              <a href="{{url('/kelas')}}" class="stretched-link"></a>
            </div>
          </div>
        </div>

      </div>
    </div>
</section>
  <!-- /topics -->
  
  <!-- faq -->
<section class="section pb-0">
    <div class="container">
      <h3 class="section-title">Pengumuman Tugas Akhir</h3>
      <div class="row masonry-wrapper">
        <!-- faq item -->
        <div class="col-md-6 mb-4">
          <div class="card card-lg">
            <div class="card-body">
              <h3 class="card-title h5">Will updates also be free?</h3>
              <p class="card-text content">Lorem, <a href="../../examplesite.com/index.html">link</a> <em>ipsum</em> dolor sit amet consectetur adipisicing elit. Cumque praesentium nisi officiis maiores quia sapiente totam omnis vel sequi corporis ipsa incidunt reprehenderit recusandae maxime perspiciatis iste placeat architecto, mollitia delectus ut ab quibusdam. Magnam cumque numquam tempore reprehenderit illo, unde cum omnis vel sed temporibus. mollitia delectus ut ab quibusdam. Magnam cumque numquam tempore reprehenderit illo, unde cum
                omnis vel sed temporibus. mollitia delectus ut ab quibusdam. Magnam cumque numquam tempore reprehenderit
                illo, unde cum omnis vel sed temporibus.</p>
            </div>
          </div>
        </div>
        <!-- faq item -->
        <div class="col-md-6 mb-4">
          <div class="card card-lg">
            <div class="card-body">
              <h3 class="card-title h5">Discounts for students and Non Profit Organizations?</h3>
              <p class="card-text content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque praesentium
                nisi officiis maiores quia sapiente totam omnis vel sequi corporis ipsa incidunt reprehenderit recusandae
                maxime perspiciatis iste placeat architecto.</p>
            </div>
          </div>
        </div>
        <!-- faq item -->
        <div class="col-md-6 mb-4">
          <div class="card card-lg">
            <div class="card-body">
              <h3 class="card-title h5">I need something unique, Can you make it?</h3>
              <p class="card-text content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque praesentium
                nisi officiis maiores quia sapiente totam omnis vel sequi corporis ipsa incidunt reprehenderit recusandae
                maxime perspiciatis iste placeat architecto, mollitia delectus <a href="../../examplesite.com/index.html">link</a>
                ut ab quibusdam. Magnam cumque numquam tempore reprehenderit illo, unde cum omnis vel sed temporibus,
                repudiandae impedit nam ad enim porro, qui labore fugiat quod suscipit fuga necessitatibus. Perferendis,
                ipsum?</p>
            </div>
          </div>
        </div>
        <!-- faq item -->
        <div class="col-md-6 mb-4">
          <div class="card card-lg">
            <div class="card-body">
              <h3 class="card-title h5">Is there any documentation and support?</h3>
              <p class="card-text content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque praesentium
                nisi officiis maiores quia sapiente totam omnis vel sequi corporis ipsa incidunt reprehenderit recusandae
                maxime perspiciatis iste placeat architecto, mollitia delectus <a href="../../examplesite.com/index.html">link</a>
                ut ab quibusdam.</p>
            </div>
          </div>
        </div>
        <!-- faq item -->
        <div class="col-md-6 mb-4">
          <div class="card card-lg">
            <div class="card-body">
              <h3 class="card-title h5">Any refunds?</h3>
              <p class="card-text content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque praesentium
                nisi officiis maiores quia sapiente totam omnis vel sequi corporis ipsa incidunt reprehenderit recusandae
                maxime perspiciatis iste placeat architecto.</p>
            </div>
          </div>
        </div>
        <!-- faq item -->
        <div class="col-md-6 mb-4">
          <div class="card card-lg">
            <div class="card-body">
              <h3 class="card-title h5">What is a product key?</h3>
              <p class="card-text content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque praesentium
                nisi officiis maiores quia sapiente totam omnis vel sequi corporis ipsa incidunt</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
  <!-- /faq -->
  
  <!-- call to action -->
<section class="section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 text-center d-lg-block d-none">
          <img src="{{asset('user/images/431.png')}}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 text-lg-left text-center">
          <h3 class="mb-3">Lihat Jadwal Tugas Akhir</h3>
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam <br> nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam</p>
          <a href="contact.html" class="btn btn-primary">Lihat Jadwal</a>
        </div>
      </div>
    </div>
</section>
  <!-- /call to action -->
@endsection