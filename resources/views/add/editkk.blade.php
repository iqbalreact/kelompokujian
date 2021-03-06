@extends('layouts.master')

@section('title')
    Edit Kelompok - TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Edit Kelompok </span>
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
                @foreach ($kelompoks as $kelompok)
                <form action="{{route('kelompok.update', $kelompok->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Edit Kelompok</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <input type="hidden" name="id" value="{{$kelompok->id }}"> <br/>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Nama Kelompok</label>
                            <input type="text" name="kelompok" value="{{$kelompok->nama_kelompok}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Penanggung Jawab</label>
                                <input type="text" name="pj" value="{{$kelompok->pj_kelompok}}" class="form-control">
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Edit Kelompok</button>
                                <button type="reset" class="btn btn-danger">Batal</button>
                            </div>
                        </div>
                            
                        @endforeach

                    </div>
                </form>
                <!-- /basic layout -->

            </div>

        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /main content -->
@endsection