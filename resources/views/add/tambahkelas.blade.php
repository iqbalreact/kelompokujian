

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
                                <label>Pilih Ruangan</label>
                                <select name="courseId" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach ($ruangans as $ruangans) 
                                    <option value="{{$ruangans->courseId}}">{{$ruangans->courseName}} ({{$ruangans->nama_kelompok}})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kode Kelas</label>
                                <input type="text" name="kode" class="form-control" placeholder="Kode Kelas">
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Tambah Kelas</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
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