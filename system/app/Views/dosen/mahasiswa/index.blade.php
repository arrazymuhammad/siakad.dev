@extends('template.base.app')
@section('page-header')
Master Data
@endsection
@section('content')


<div class="card">
	<div class="card-header">
		Master Data Mahasiswa
		<div class="card-close">
			<div class="dropdown">
				<button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
				<div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
					<a href="{{url('mahasiswa/card-register')}}" class="btn btn-block text-left p10 btn-sm "><i class="fa fa-pencil"></i> Register Kartu</a>
					<a href="{{url('setting/card/reset')}}" class="btn btn-block text-left p10 btn-sm " onclick="return confirm('Yakin Mereset Kartu?')"><i class="fa fa-times"></i> Reset Kartu</a>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-stripped table-datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>Kehadiran</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php $i = 1?>
					@foreach($daftar_ajar as $k => $ajar)
						@foreach($ajar->kelas->mahasiswa as $key => $mahasiswa)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$mahasiswa->nim}}</td>
							<td>{{$mahasiswa->nama}}</td>
							<td>{{$ajar->nama}}</td>
							<td class="text-center">{{$ajar->getKehadiranMahasiswa(null,$mahasiswa->id,$ajar)}} %</td>
							<td class="text-right">
								<a href="{{($mahasiswa->user->id_card) ? '#' : url('dosen/mahasiswa/card-register').'/'.$mahasiswa->id_kelas}}" class="btn btn-sm btn-{{($mahasiswa->user->id_card) ? 'success' : 'muted'}}"><i class="fa fa-credit-card"></i></a>
								<a href="{{url('admin/master/mahasiswa')}}/{{$mahasiswa->id}}" class="btn btn-sm btn-danger" data-method="delete" data-confirm="Yakin Menghapus Mahasiswa ini?"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						@endforeach
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection