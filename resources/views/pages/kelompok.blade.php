
@extends('layouts.master')

@section('title')
    Kelompok - TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Kelola Kelompok Keahlian </span>
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
						<button type="button" class="btn btn-success">Tambah Kelompok</button>
					</div>

					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Kelompok</th>
								<th>Penanggung Jawab</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td><a href="#">Enright</a></td>
								<td>Traffic Court Referee</td>
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="#"><i class="icon-file-pdf"></i> Hapus</a></li>
												<li><a href="#"><i class="icon-file-excel"></i> Edit</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
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