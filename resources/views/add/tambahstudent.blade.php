@extends('layouts.master')

@section('title')
    Tambah Anggota / Mahasiswa - TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Tambah Anggota / Mahasiswa </span>
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
                <form action="{{route('course.addstudent-course')}}" method="POST">
                    @csrf
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Tambah Anggota / Mahasiswa</h5>
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
                                <input type="hidden" value="{{$id}}" name="courseId">
                                <label>Email Mahasiswa</label>
                                <input type="email" id="userId" name="userId" class="form-control" placeholder="Email Mahasiswa">
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Simpan</button>
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