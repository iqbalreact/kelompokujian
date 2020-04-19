
@extends('layouts.master')

@section('title')
    Detail Ruangan Kelas - TA Sipil
@endsection

@section('page-head')
    <!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">Detail Ruangan Kelas </span>
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
        @foreach ($ruangans as $item)
        <div class="row">
            <div class="col-lg-6">
                
				<!-- Basic datatable -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title"><b>Detail Ruangan Kelas</b></h5>
						<div class="heading-elements">
							<ul class="icons-list">
                                @if ($item->courseState == "ACTIVE")
                                @else
		                		<li><a href="{{route('course.active-course',$item->courseId)}}"><button type="button" class="btn btn-success">Aktifkan Ruangan</button></a></li>
                                @endif
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
                        {{-- <div class="col-lg-4"> --}}
                        {{-- <a href="{{route('course.addcourse')}}"><button type="button" class="btn btn-success">Tambah Ruangan Kelas</button></a> --}}
                            <h6 class="text-semibold">Kelompok :</h6>
                            <p>{{$item->nama_kelompok}}</p>
                            <hr>
                            <h6 class="text-semibold">Nama Ruangan :</h6>
                            <p>{{$item->courseName}}</p>
                            <hr>
                            <h6 class="text-semibold">Pemilik Ruangan :</h6>
                            <p>{{$item->ownerId}}</p>
                            <hr>
                            <h6 class="text-semibold">Kode Ruangan :</h6>
                            <p>{{$item->enrollmentCode}}</p>
                            <hr>
                            <h6 class="text-semibold">Status Ruangan :</h6>

                            @if ($item->courseState == "ACTIVE")
                            <span class="label label-success heading-text">{{$item->courseState}}</span> 
                            @else
                            <span class="label label-danger heading-text">{{$item->courseState}}</span> 
                            @endif
                            <hr>
                            <h6 class="text-semibold">Link Ruangan :</h6>
                            <p><a href="{{$item->courseLink}}">{{$item->courseLink}}</a></p>
                            <hr>
                        {{-- </div> --}}
					</div>
                    
				</div>
				<!-- /basic datatable -->
            </div>
            
            <div class="col-lg-6">
                <!-- Multiple elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title">Pengajar / Dosen Ruangan</h6>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                {{-- <li><a href="" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_title_basic"><i class="icon-googleplus5"></i></a></li> --}}
                                <li><a href="{{route('course.teacher-course',$item->courseId)}}" title="Add"><i class="icon-googleplus5"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($teachers as $teacher)
                                            
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$teacher->nameteacher}}</td>
                                        <td>{{$teacher->teacherId}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="#" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="#">
                                                    <button type="submit" class="btn btn-danger" onclick="alert('Yakin ingi menghapus ?')" title="Hapus">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /striped rows -->
                <!-- Multiple elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title">Mahasiswa / Anggota</h6>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a href="{{route('course.student-course',$item->courseId)}}" title="Add"><i class="icon-googleplus5"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                            
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$student->nameStudent}}</td>
                                        <td>{{$student->studentId}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{route('course.deletestudent-course')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="courseId" value="{{$item->courseId}}">
                                                    <input type="hidden" name="userId" value="{{$student->studentId}}">
                                                    <button type="submit" class="btn btn-danger" onclick="alert('Yakin ingi menghapus ?')" title="Hapus">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /striped rows -->
            </div>
        </div>
        @endforeach
        <!-- /dashboard content -->
    </div>
    <!-- /main content -->
    
    @endsection