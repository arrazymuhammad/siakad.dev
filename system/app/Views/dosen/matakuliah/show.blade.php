@extends('template.base.app')

@section('page-header')
Mata Kuliah {{$ajar->nama}}
@endsection

@section('content')
<div class="row">
	<div class="col-md-4">
		<div class="statistic d-flex align-items-center bg-white has-shadow">
			<div class="icon bg-red"><i class="fa fa-user"></i></div>
			<div class="text"><strong>{{$ajar->kelas->mahasiswa->count()}}</strong>
				<br><small>Mahasiswa</small>
			</div>
		</div>	
	</div>
	<div class="col-md-4">
		<div class="statistic d-flex align-items-center bg-white has-shadow">
			<div class="icon bg-blue"><i class="fa fa-clock-o"></i></div>
			<div class="text"><strong>{{$ajar->total_pertemuan}}</strong>
				<br><small>Pertemuan</small>
			</div>
		</div>	
	</div>
	<div class="col-md-4">
		<div class="statistic d-flex align-items-center bg-white has-shadow">
			<div class="icon bg-primary"><i class="fa fa-area-chart"></i></div>
			<div class="text"><strong>{{$ajar->kehadiran}}%</strong>
				<br><small>Kehadiran</small>
			</div>
		</div>	
	</div>
</div>
</section>
<section class="container">
<div class="row">
	<div class="col-md-4">
		<a href="{{url("matakuliah/$ajar->id/materi")}}" class="statistic d-flex align-items-center bg-white has-shadow">
			<div class="icon bg-warning"><i class="fa fa-book"></i></div>
			<div class="text"><strong>Materi</strong>
			</div>
		</a>	
	</div>
	<div class="col-md-4">
		<a href="{{url("matakuliah/$ajar->id/tugas")}}" class="statistic d-flex align-items-center bg-white has-shadow">
			<div class="icon bg-danger"><i class="fa fa-sticky-note"></i></div>
			<div class="text"><strong>Tugas</strong>
			</div>
		</a>	
	</div>
	<div class="col-md-4">
		<a href="{{url("matakuliah/$ajar->id/nilai")}}" class="statistic d-flex align-items-center bg-white has-shadow">
			<div class="icon bg-success"><i class="fa fa-line-chart"></i></div>
			<div class="text"><strong>Nilai</strong>
			</div>
		</a>	
	</div>
</div>
</section>
<section class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="articles card">
				<div class="card-header d-flex align-items-center">
					<h2 class="h3">Peserta Kuliah   </h2>
				</div>
				<div class="card-body no-padding">
					@foreach ($ajar->kelas->mahasiswa->chunk(3) as $chunk)
						<div class="row">
							@foreach ($chunk as $item)
						           <div class="col-md-4">
									<div class="item d-flex align-items-center">
										<div class="image"><img src="{{url('public')}}/img/avatar-1.jpg" alt="..." class="img-fluid"></div>
										<div class="text" style="width:100%">
											<a href="{{url("mahasiswa/$item->id")}}">
												<h3 class="h5">{{$item->nama}}</h3>
												<small>Kehadiran {{$ajar->getKehadiranMahasiswa(null,$item->id,$ajar)}}%</small>
											</a>
											<small class="progress">
												<div role="progressbar" style="width: {{$ajar->getKehadiranMahasiswa(null,$item->id,$ajar)}}%; height: 6px;" title="Kehadiran {{$ajar->getKehadiranMahasiswa(null,$item->id,$ajar)}}%" class="progress-bar {{($ajar->getKehadiranMahasiswa(null,$item->id,$ajar) < 80) ? "bg-red":"bg-info"}}"></div>
											</small>
										</div>
									</div>
								</div>
						       @endforeach
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection