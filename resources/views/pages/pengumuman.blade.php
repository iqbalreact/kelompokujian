
@extends('layouts.master')

@section('title')
    Pengumuman - TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Pengumuman Kelas Tugas Akhir </span>
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
						<h5 class="panel-title"><b>Daftar Pengumuman</b></h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
						<a href="{{route('pengumuman.create')}}"><button type="button" class="btn btn-success">Tambah Pengumuman</button></a>
					</div>

					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>No</th>
								<th>Kategori Pengumuman</th>
								<th>Judul Pengumuman</th>
								<th>Isi Pengumuman</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($pengumumans as $pengumuman)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>
										@if ($pengumuman->kategori_pengumuman === 'soutline')
											Seminar Outline
										@else
											Sidang Akhir
										@endif
									
								</td>
								<td>{{$pengumuman->judul_pengumuman}}</td>
								<td>{!! $pengumuman->isi_pengumuman !!}</td>
								<td class="text-center">
									<a href="{{route('pengumuman.edit',$pengumuman->id)}}" class="btn btn-info"><i class="icon-pencil"></i></a>
									<div class="btn-group">
										<form action="{{route('pengumuman.destroy',$pengumuman->id)}}" method="POST">
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