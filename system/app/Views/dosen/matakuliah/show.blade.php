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
<section>
	<div class="col-md-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="articles card">
					<div class="card-header d-flex align-items-center">
						<h2 class="h3">Peserta Kuliah   </h2>
					</div>
					<div class="card-body no-padding">
						@foreach ($ajar->kelas->mahasiswa->chunk(4) as $chunk)
							<div class="row">
								@foreach ($chunk as $item)
						            <div class="col-md-3">
										<div class="item d-flex align-items-center">
											<div class="image"><img src="{{url('public')}}/img/avatar-1.jpg" alt="..." class="img-fluid"></div>
											<div class="text">
												<a href="{{url("/admin/master/mahasiswa/$item->id")}}">
													<h3 class="h5">{{$item->nama}}</h3>
												</a>
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
	</div>
@endsection