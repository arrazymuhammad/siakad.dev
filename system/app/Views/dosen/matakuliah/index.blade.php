@extends('template.base.app')

@section('page-header')
Dashboard
@endsection

@section('content')
	<div class="card">
		<div class="card-header">
			<div class="card-title">
				Mata Kuliah
			</div>
		</div>
		<div class="card-body">
			@foreach($ajar as $item)
				<a class="project btn btn-block btn-link"  style="text-decoration: none" href="{{url("dosen/matakuliah/$item->id")}}">
					<div class="row bg-white has-shadow">
						<div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
							<div class="project-title d-flex align-items-center">
								<div class="text">
									<div class="text-muted"><h4 class="h4">{{$item->nama}}</h4></div>
								</div>
							</div>
						</div>
						<div class="right-col col-lg-6 d-flex align-items-center">
							<div class="time" title="Jumlah pertemuan"><i class="fa fa-clock-o"></i>{{$item->total_pertemuan}} </div>
							<div class="time" title="Tugas"><i class="fa fa-tasks"></i>{{$item->tugas->count()}} </div>
							<div class="comments" title="Jumlah Mahasiswa"><i class="fa fa-user"></i>{{$item->kelas->mahasiswa->count()}}</div>
							<div class="project-progress" title="Persentase Kehadiran">
								<div class="progress">
									<div role="progressbar" style="width: {{$item->kehadiran}}%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
								</div>
								{{$item->kehadiran}}%
							</div>
						</div>
					</div>
				</a>
			@endforeach
		</div>
	</div>
@endsection