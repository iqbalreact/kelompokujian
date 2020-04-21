
@extends('layouts.master')

@section('title')
    Kelas - TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Kelola Kelas </span>
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
            <div class="col-lg-12">
				<!-- Basic datatable -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title"><b>Daftar Kelompok</b></h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
						<a href="{{route('kelas.create')}}"><button type="button" class="btn btn-success">Tambah Kelas</button></a>
					</div>

					<table class="table datatable-basic table-scrollable">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Kelas</th>
								<th>Kelompok</th>
								<th>Kode Kelas</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($rooms as $room)
							<tr>
								<td>{{$loop->iteration}}</td>
								{{-- <td>{{$room->id}}</td> --}}
								<td>{{$room->courseName}}</td>
								<td>{{$room->nama_kelompok}}</td>
								<td><a href="{{$room->kode_kelas}}"><button type="button" class="btn btn-success">Join Kelas</button></a></td>
								<td class="text-center">
									<a href="{{route('kelas.edit',$room->courseId)}}" class="btn btn-info">Edit</a>
									<div class="btn-group">
										<form action="{{route('kelas.destroy',$room->courseId)}}" method="POST">
											<button type="submit" class="btn btn-danger" onclick="alert('Yakin ingi menghapus ?')" title="Hapus">Hapus</button>
											@csrf
											@method('DELETE')   
										</form>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->
            </div>
        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /main content -->
@endsection