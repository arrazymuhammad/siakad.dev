@extends('template.base.app')

@section('page-header')
Tugas Mata Kuliah {{$ajar->nama}}
@endsection

@section('content')
	<div class="card">
		<div class="card-header">
			<div class="card-title">
				Tugas Perkuliahan
			</div>
			<div class="card-close">
				<a href="{{url("matakuliah/$ajar->id/tugas/create")}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Tugas</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-datatable">
				<thead>
					<th>No</th>
					<th>Pertemuan Ke</th>
					<th>Nama Tugas</th>
					<th>Batas Pengumpulan</th>
					<th>% Terkumpul</th>
					<th>Aksi</th>
				</thead>
				<tbody>
					@foreach($ajar->pertemuan->pluck('tugas') as $tugas)
						@if($tugas)
						<tr>
							<td>1</td>
							<td>{{$tugas->pertemuan->pertemuan_no}}</td>
							<td>{{$tugas->nama}}</td>
							<td>{{$tugas->deadline->diffForHumans()}}</td>
							<td>2</td>
							<td>
								<a href="{{url("matakuliah/$ajar->id/tugas")}}/{{$tugas->id}}" class="btn btn-sm btn-info"><i class="fa fa-info"></i></a>
								<a href="{{url("matakuliah/$ajar->id/tugas")}}/{{$tugas->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
								<a href="{{url("matakuliah/$ajar->id/tugas")}}/{{$tugas->id}}" class="btn btn-sm btn-danger" data-method="delete" data-confirm="Yakin Menghapus Tugas ini?"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection