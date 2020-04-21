

@extends('layouts.master')

@section('title')
    Edit Kelas - TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Edit Kelas </span>
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
                @foreach ($rooms as $room)
                    
                <form action="{{route('kelas.update', $room->courseId)}}" method="POST">
                    @csrf
                    @method('PUT')
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
                            <input type="hidden" name="id" value="{{$room->courseId}}"> <br/>
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <input type="text" name="nama_kelas" value="{{$room->courseName}} - ({{$room->nama_kelompok}})" class="form-control" placeholder="Nama Kelas" readonly>
                            </div>

                            <div class="form-group">
                                <label>Kode Kelas</label>
                                <input type="text" name="kode" class="form-control" value="{{$room->kode_kelas}}" placeholder="Kode Kelas">
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Edit Kelas</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /basic layout -->
                @endforeach


            </div>

        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /main content -->
@endsection