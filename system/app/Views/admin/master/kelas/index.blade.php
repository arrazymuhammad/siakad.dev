@extends('template.base.app')
@section('page-header')
Master Data Kelas
@endsection
@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="semi-bold">
		Master Data Kelas
		</h3>
		<div class="card-close">
			<div class="dropdown">
				<button data-toggle="collapse" href="#form_create_kelas" aria-expanded="false" aria-controls="form_create_kelas" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Kelas</button>
			</div>
		</div>
		<form action="" method="post" class="collapse" id="form_create_kelas">
			<hr>
			{{csrf_field()}}
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="" class="form-label">Angkatan</label>
						<select name="angkatan" id="angkatan" class="form-control">
							<option value="">Pilih Angkatan</option>
							@for( $i = date("Y"); $i>=2015; $i--)
							<option value="{{$i}}">{{$i}}</option>
							@endfor
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="" class="form-label">Nama Kelas</label>
						<input type="text" name="nama" id="nama" class="form-control">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group text-right">
						<button class="btn btn-primary">Tambah</button>
						<button type="reset" class="btn btn-link text-muted" data-toggle="collapse" href="#form_create_kelas" aria-expanded="false" aria-controls="form_create_kelas" >Tutup</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-stripped table-datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Angkatan</th>
						<th>Nama Kelas</th>
						<th>Jumlah Mahasiswa</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($kelas->sortBy('nama')->sortByDesc('angkatan')->values() as $key => $item)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$item->angkatan}}</td>
						<td>{{$item->nama}}</td>
						<td>{{$item->mahasiswa->count()}}</td>
						<td class="text-right">
							<a href="{{url("admin/master/mahasiswa/create?id_kelas=$item->id")}}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> tambah mahasiswa</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection