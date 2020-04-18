
@extends('layouts.master')

@section('title')
    Ruangan Kelas - TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Kelola Ruangan Kelas </span>
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
						<h5 class="panel-title"><b>Daftar Ruangan Kelas</b></h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
						<a href="{{route('course.addcourse')}}"><button type="button" class="btn btn-success">Tambah Ruangan Kelas</button></a>
					</div>

					<table class="table datatable-basic table-scrollable">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Ruangan</th>
								<th>Kelompok</th>
								<th>Kode Ruangan</th>
								<th>Link Ruangan</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($ruangans as $ruangans)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$ruangans->courseName}}</td>
								<td>{{$ruangans->nama_kelompok}}</td>
								<td>{{$ruangans->courseId}}</td>
								<td>{{$ruangans->courseLink}}</td>
								<td class="text-center">
									<div class="btn-group">
										<a href="{{route('course.editcourse',$ruangans->courseId)}}" class="btn btn-info"><i class="icon-pencil"></i></a>
										<form action="{{route('course.archivecourse',$ruangans->id)}}" method="POST">
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