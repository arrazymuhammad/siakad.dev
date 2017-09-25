@extends('template.base.app')
@section('page-header')
Master Data Tahun Ajar
@endsection
@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="semi-bold">
		Master Data Tahun Ajar
		</h3>
		<div class="card-close">
			<div class="dropdown">
				<button data-toggle="collapse" href="#form_create_kelas" aria-expanded="false" aria-controls="form_create_kelas" class="btn btn-primary btn-sm">
					<i class="fa fa-plus"></i> Tambah Tahun Ajar
				</button>
			</div>
		</div>
		<form action="" method="post" class="collapse" id="form_create_kelas">
			<hr>
			{{csrf_field()}}
			<input type="hidden" name="id_tahun_ajar" id="id_tahun_ajar">
			<input type="hidden" name="method" id="method">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="" class="form-label">Tahun Ajar</label>
						<select name="tahun" id="tahun" class="form-control">
							@for( $i = date("Y"); $i>=2015; $i--)
								<option value="{{$i}}">{{$i." /".($i+1)}}</option>
							@endfor
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="" class="form-label">Semester</label>
						<select name="semester" id="semester" class="form-control">
							<option value="1">Gasal</option>
							<option value="2">Genap</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="" class="form-label">Status</label>
						<select name="status" id="status" class="form-control">
							<option value="1">Aktif</option>
							<option value="0">Tidak Aktif</option>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group text-right">
						<button class="btn btn-primary" id="btn_tambah">Tambah</button>
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
						<th>Tahun Ajar</th>
						<th>Semester</th>
						<th>Status</th>
						<th>Jumlah Kelas</th>
						<th>Jumlah Mahasiswa</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tahun_ajar->sortByDesc('id')->values() as $key => $item)
						<tr>
							<td>{{$key+1}}</td>
							<td>{{$item->tahun." / ".($item->tahun+1)}}</td>
							<td>{{($item->semester == 1) ? "Gasal" : "Genap"}}</td>
							<td>{{($item->status == 1) ? "Aktif" : "Tidak Aktif"}}</td>
							<td></td>
							<td></td>
							<td>
								<button onclick="editTahunAjar({{$item->id.",".$item->tahun.",".$item->semester.",".$item->status}})" data-toggle="collapse" href="#form_create_kelas" aria-expanded="false" aria-controls="form_create_kelas" class="btn btn-sm btn-warning">
									<i class="fa fa-pencil"></i>
								</button>
								<a href="{{url('admin/master/matakuliah')}}/{{$item->id}}" class="btn btn-sm btn-danger" data-method="delete" data-confirm="Yakin Menghapus Data ini?"><i class="fa fa-trash-o"></i></a></td>
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
		function editTahunAjar(id,tahun,semester,status){
			$("#id_tahun_ajar").val(id)
			$("#method").val(2)
			$("#tahun").val(tahun)
			$("#semester").val(semester)
			$("#status").val(status)
			$("#btn_tambah").html("Simpan")
		}
	</script>
@endsection