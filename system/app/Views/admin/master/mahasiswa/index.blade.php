@extends('template.base.app')
@section('page-header')
Master Data
@endsection
@section('content')


<div class="card">
	<div class="card-header">
		Master Data Mahasiswa @if(isset($angkatan)) <small>Angkatan {{$angkatan}} </small> @endif
		<div class="card-close">
			<div class="dropdown">
				<button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
				<div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
					<a href="{{url('admin/master/mahasiswa/create')}}" class="btn btn-sm btn-block text-left p10 "><i class="fa fa-plus"></i> Tambah Mahasiswa</a>
					<a href="{{url('admin/setting/card/register')}}" class="btn btn-block text-left p10 btn-sm "><i class="fa fa-pencil"></i> Register Kartu</a>
					<a href="{{url('admin/setting/card/reset')}}" class="btn btn-block text-left p10 btn-sm " onclick="return confirm('Yakin Mereset Kartu?')"><i class="fa fa-times"></i> Reset Kartu</a>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label for="" class="form-label">Angkatan</label>
					<select name="angkatan" id="angkatan" class="form-control" onchange="gantiAngkatan(this.value)">
						<option value="">Pilih Angkatan</option>
						@for( $i = date("Y"); $i>=2015; $i--)
						<option value="{{$i}}">{{$i}}</option>
						@endfor
						<option value="all">Semua Angkatan</option>
					</select>
				</div>
			</div>
			@if(isset($angkatan))
			<div class="col">
				<div class="form-group">
					<label for="" class="form-label">Kelas</label>
					<select name="angkatan" id="angkatan" class="form-control" onchange="gantiKelas(this.value)">
						<option value="">Pilih Kelas</option>
						@foreach($kelas as $item)
						<option value="{{$item->id}}">{{$item->nama}}</option>
						@endforeach
						<option value="all">Semua Kelas</option>
					</select>
				</div>
			</div>
			@endif
		</div>
		<div class="table-responsive">
			<table class="table table-stripped table-datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th width="180px">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($mahasiswa as $key => $item)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$item->nim}}</td>
						<td>{{$item->nama}}</td>
						<td>{{$item->nama_kelas}}</td>
						<td class="text-right">
							<a href="" class="btn btn-sm btn-{{($item->user->id_card) ? 'success' : 'muted'}}"><i class="fa fa-credit-card"></i></a>
							<a href="{{url('admin/master/mahasiswa')}}/{{$item->id}}" class="btn btn-sm btn-info"><i class="fa fa-info"></i></a>
							<a href="{{url('admin/master/mahasiswa')}}/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
							<a href="{{url('admin/master/mahasiswa')}}/{{$item->id}}" class="btn btn-sm btn-danger" data-method="delete" data-confirm="Yakin Menghapus Mahasiswa ini?"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('custom_script')
	<script>
		function gantiAngkatan(angkatan){
			if(angkatan == "all"){
				location.href = "{{url('admin/master/mahasiswa')}}";
			} else {
				location.href = "{{url('admin/master/mahasiswa?angkatan=')}}"+angkatan;
			}
		}
		@if(isset($angkatan))
		function gantiKelas(kelas){
			if(angkatan == "all"){
				location.href = "{{url('admin/master/mahasiswa?angkatan=').$angkatan}}";
			} else {
				location.href = "{{url('admin/master/mahasiswa?angkatan=').$angkatan}}&id_kelas="+kelas;
			}
		}
		@endif
	</script>
@endsection