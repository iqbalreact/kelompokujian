
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
						<h5 class="panel-title"><b>Detail Ruangan Kelas</b></h5>
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
								<th>Status Ruangan</th>
								<th>Link Ruangan</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							@if (count($ruangans) != 0)
							
							@foreach ($ruangans as $ruangans)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$ruangans->courseName}}</td>
								<td>{{$ruangans->nama_kelompok}}</td>
								<td>{{$ruangans->enrollmentCode}}</td>
								<td>
									@if ($ruangans->courseState == "ACTIVE")
									<span class="label label-success heading-text">{{$ruangans->courseState}}</span> 
									@else
									<span class="label label-danger heading-text">{{$ruangans->courseState}}</span> 
									@endif
								<td><a href="{{$ruangans->courseLink}}">{{$ruangans->courseLink}}</a></td>
								<td class="text-center">
									{{-- <button type="button" class="btn btn-default btn-sm" data-toggle="modal" href="#detailCourse" onclick="getDetailCourse({{$ruangans->courseId}})">Detail</button> --}}
									<a href="{{route('course.detail-course',$ruangans->courseId)}}" class="btn btn-default">Detail</a>
									@if ($ruangans->courseState == "ACTIVE")
									@else
									<a href="{{route('course.editcourse',$ruangans->courseId)}}" class="btn btn-info">Edit</a>
									@endif
									<div class="btn-group">
										<form action="{{route('course.archivecourse')}}" method="POST">
											@csrf
											<input type="hidden" name="id" value="{{$ruangans->courseId}}">
											<button type="submit" class="btn btn-danger" onclick="alert('Yakin ingi menghapus ?')" title="Hapus">Hapus</button>
										</form>
									</div>
								</td>
							</tr>
							@endforeach

							@else                
            				@endif
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