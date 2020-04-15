
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

					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>No</th>
								<th>Kelompok</th>
								<th>Nama Kelas</th>
								<th>Kode Kelas</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($rooms as $room)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$room->nama_kelompok}}</td>
								<td>{{$room->nama_kelas}}</td>
								<td>{{$room->kode_kelas}}</td>
								<td class="text-center">
									<div class="btn-group">
										<a href="{{route('kelas.edit',$room->id)}}" class="btn btn-info"><i class="icon-pencil"></i></a>
										<form action="{{route('kelas.destroy',$room->id)}}" method="POST">
											<button type="submit" class="btn btn-danger" onclick="alert('Yakin ingi menghapus ?')" title="Hapus"><i class="icon-trash"></i> </button>
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