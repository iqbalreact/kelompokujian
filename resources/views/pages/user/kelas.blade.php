@extends('layouts.user.master')

@section('title')
    Daftar Kelas TA
@endsection

@section('content')
    <!-- banner -->
    <!-- details page -->
<section class="pt-5">
    <div class="container">
        <h3 class="section-title">Daftar Kelas</h3>
    </div>
    <div class="container shadow section-sm rounded">
        <div class="row">
        <!-- sidebar -->
        <div class="col-lg-3">
          <ul class="sidenav">
            <li title="Basic Startup" class="sidelist parent active">
              <a href="list.html">Manajemen Rekayasa Konstruksi</a>
            </li>
            <li class="sidelist">
                <a href="list.html">Rekayasa Transportasi</a>
            </li>
            <li class="sidelist">
                <a href="list.html">Geoteknik</a>
            </li>
            <li class="sidelist">
                <a href="list.html">Teknik Sumber Daya Air</a>
            </li>
            <li class="sidelist">
                <a href="list.html">Struktur</a>
            </li>
          </ul>
        </div>
  
        <!-- body -->
        <div class="col-lg-8">
          <div class="px-lg-5 px-4">
            <div class="content">
                <div class="row">
                    <!-- topic -->
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="card match-height text-center">
                            <div class="card-body">
                                <h4 class="mb-4 font-weight-medium">Kelas A</h4> <!-- main content -->
                                <button type="submit" class="btn btn-primary">Gabung Kelas</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="card match-height text-center">
                            <div class="card-body">
                                <h4 class="mb-4 font-weight-medium">Kelas B</h4> <!-- main content -->
                                <button type="submit" class="btn btn-primary">Gabung Kelas</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="card match-height text-center">
                            <div class="card-body">
                                <h4 class="mb-4 font-weight-medium">Kelas C</h4> <!-- main content -->
                                <button type="submit" class="btn btn-primary">Gabung Kelas</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="card match-height text-center">
                            <div class="card-body">
                                <h4 class="mb-4 font-weight-medium">Kelas D</h4> <!-- main content -->
                                <button type="submit" class="btn btn-primary">Gabung Kelas</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /details page -->

@endsection