@extends('layouts.master')

@section('title')
    Edit Pengumuman- TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Edit Pengumuman</span>
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
                @foreach ($pengumumans as $pengumuman)
                <form action="{{route('pengumuman.update', $pengumuman->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$pengumuman->id }}"> <br/>
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Edit Pengumuman</h5>
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
                                <label>Kategori Pengumuman</label>
                                <select name="kategori" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="soutline">Seminar Outline</option>
                                    <option value="sakhir">Sidang Akhir</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Judul Pengumuman</label>
                                <input type="text" name="judul" value="{{$pengumuman->judul_pengumuman}}" class="form-control" placeholder="Judul Pengumuman">
                            </div>
                            <div class="form-group">
                                <label>Isi Pengumuman</label>
                                <textarea name="isi" rows="40">{{$pengumuman->isi_pengumuman}}</textarea>
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Update Pengumuman</button>
                                <a href="{{url('/admin/pengumuman')}}"><button type="button" class="btn btn-danger">Kembali</button></a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /basic layout -->
                @endforeach

            </div>

        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /main content -->
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'isi' );
	</script>
@endsection