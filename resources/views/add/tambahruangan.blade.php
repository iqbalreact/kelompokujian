@extends('layouts.master')

@section('title')
    Tambah Ruangan - TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Tambah Ruangan </span>
				</h4>
			</div>

		</div>
	</div>
	<!-- /page header -->
@endsection

@section('content')
    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Dashboard content -->
        <div class="row">
            <div class="col-md-12">

                <!-- Basic layout-->
                <form action="{{route('course.storecourse')}}" method="POST">
                    @csrf
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Tambah Ruangan Baru</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        

                        <div class="panel-body">
                            <div class="form-group">
                                <label>Pilih Kelompok</label>
                                <select name="kelompok_id" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach ($kelompoks as $kelompok) 
                                    <option value="{{$kelompok->id}}">{{$kelompok->nama_kelompok}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Ruangan Kelas</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Ruangan Kelas">
                            </div>

                            <div class="form-group">
                                <label>Email Pemilik/Guru Ruangan</label>
                                <input type="text" id="ownerId" name="ownerId" class="form-control" placeholder="Masukan Email Guru">
                            </div>

                            <div class="form-group">
                                <label>Judul Deskripsi Ruangan Kelas</label>
                                <input type="text" id="descriptionHeading" name="descriptionHeading" class="form-control" placeholder="Masukan Judul Deskripsi">
                            </div>
                            
                            <div class="form-group">
                                <label>Deskripsi Ruangan Kelas</label>
                                <textarea rows="3" cols="3" id="description" name="description" class="form-control" placeholder="Masukan Deskripsi Ruangan"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Bagian</label>
                                <input type="text" id="section" name="section" class="form-control" placeholder="Masukan Bagian">
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Buat Ruangan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /basic layout -->

            </div>

        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /main content -->
@endsection