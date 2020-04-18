@extends('layouts.master')

@section('title')
    Tambah Pengumuman- TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Tambah Pengumuman</span>
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
                <form action="{{route('pengumuman.store')}}" method="POST">
                    @csrf
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Tambah Pengumuman Baru</h5>
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
                                <input type="text" name="judul" class="form-control" placeholder="Judul Pengumuman">
                            </div>
                            <div class="form-group">
                                <label>Isi Pengumuman</label>
                                <textarea name="isi" rows="40"></textarea>
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Tambah Kelompok</button>
                                <button type="reset" class="btn btn-danger">Batal</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /basic layout -->

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