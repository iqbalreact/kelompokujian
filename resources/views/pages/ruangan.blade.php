
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
								<th>ID Ruangan</th>
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
									<button type="button" class="btn btn-default btn-sm" data-toggle="modal" href="#detailCourse" onclick="getDetailCourse({{$ruangans->courseId}})">Detail</button>
									<a href="{{route('course.editcourse',$ruangans->courseId)}}" class="btn btn-info">Edit</a>
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
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->
            </div>
        </div>
        <!-- /dashboard content -->
    </div>
	<!-- /main content -->

	<!-- Modal with h6 -->
	<div id="detailCourse" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="modal-title">Detail Ruangan Kelas</h6>
				</div>

				<div class="modal-body">
					<h6 class="text-semibold">Text in a modal</h6>
					<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>

					<hr>

					<h6 class="text-semibold">Another paragraph</h6>
					<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
					<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
					{{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
				</div>
			</div>
		</div>
	</div>
	<!-- /modal with h6 -->

	<script src="">
		function reverseGeocodeAddress() {
			$.ajax({
				type: "POST",
				url: '{{ url('admin/course/detail') }}',
				data: "",
				success: function() {
					console.log("Geodata sent");
				}
			})
		};
	</script>

	<script src="javascript">
	var url = '{{ url('admin/course/detail') }}';
	function getDetailCourse(id){
		var url_id = url + '/' + id
		$.get(url_id, function(data){
			$('#id-edit-tembusan').val(data.id);
		});
	}


	</script>

@endsection