
@extends('layouts.user')

@section('title')
    Welcome - TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					{{-- <i class="icon-arrow-left52 position-left"></i> --}}
					<span class="text-semibold">Welcome, KELAS TA Teknik Sipil</span>
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

                <!-- Quick stats boxes -->
                <div class="row">
                    @foreach ($result as $items)
                    <div class="col-lg-4">
                        <!-- Basic datatable -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                            <h5 class="panel-title"><b>{{$items[0]->nama_kelompok}}</b></h5>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <table class="table datatable-basic">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->nama_kelas}}</td>
                                            <td><a href="{{$item->kode_kelas}}"><button type="button" class="btn btn-success">Join Kelas</button></a></td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                            <!-- /basic datatable -->
                    @endforeach
                </div>
                <!-- /quick stats boxes -->
            </div>
        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /main content -->
@endsection