

@extends('layouts.master')

@section('title')
    Edit Ruangan - TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Edit Ruangan </span>
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
                <form action="{{route('course.updatecourse')}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Edit Ruangan</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <input type="hidden" name="id" value="{{ $details['data']['id'] }}">
                            <input type="hidden" id="ownerId" name="ownerId" value="{{ $details['data']['ownerId'] }}" class="form-control">
                            <div class="form-group">
                                <label>Pilih Kelompok</label>
                                <select name="kelompok_id" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach ($kelompoks as $kelompok) 
                                    <option value="{{$kelompok->id}}">{{$kelompok->nama_kelompok}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Ruangan Kelas</label>
                                <input type="text" id="name" name="name" value="{{ $details['data']['name'] }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Ruangan Kelas</label>
                                <textarea rows="3" cols="3" id="description" name="description" class="form-control">{{ $details['data']['description'] }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Judul Deskripsi Ruangan Kelas</label>
                                <input type="text" id="descriptionHeading" name="descriptionHeading" class="form-control" value="{{ $details['data']['descriptionHeading'] }}">
                            </div>

                            <div class="form-group">
                                <label>Bagian</label>
                                <input type="text" id="section" name="section" class="form-control" value="{{ $details['data']['section'] }}">
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Update Ruangan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- @endforeach --}}
            </div>

        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /main content -->
@endsection