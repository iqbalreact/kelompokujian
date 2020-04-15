

@extends('layouts.master')

@section('title')
    Tambah Kelas - TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Tambah Kelas </span>
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
                <form action="{{route('kelas.store')}}" method="POST">
                    @csrf
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Tambah Kelas Baru</h5>
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
                                <label>Nama Kelas</label>
                                <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas">
                            </div>

                            <div class="form-group">
                                <label>Kode Kelas</label>
                                <input type="text" name="kode" class="form-control" placeholder="Kode Kelas">
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Tambah Kelas</button>
                                <button type="reset" class="btn btn-danger">Batal</button>
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