@extends('template.base.app')

@section('page-header')
Tugas Mata Kuliah {{$ajar->nama}}
@endsection

@section('content')
	<div class="card">
		<div class="card-header">
			<div class="card-title">
				Tambah Tugas Perkuliahan
			</div>
		</div>
		<div class="card-body">
			<form action="{{url("matakuliah/$ajar->id/tugas")}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <input type="hidden" name="method" value="create">
				<div class="row">
					<div class="col-md-6">
	                    <div class="form-group">
	                        <label for="" class="form-label">Nama Tugas</label>
	                        <input type="text" name="nama" id="nama" class="form-control" >
	                    </div>
	                    <div class="form-group">
	                        <label for="" class="form-label">Batas Pengumpulan</label>
	                        <input type="text" name="deadline" id="batas_pengumpulan" class="form-control datetime" >
	                    </div>
	                    <div class="form-group">
	                        <label for="" class="form-label">File Pendukung</label>
	                        <input type="file" name="file" id="batas_pengumpulan" class="form-control">
	                    </div>
	                    
					</div>
					<div class="col-md-6">
	                    <div class="form-group">
	                        <label for="" class="form-label">Pertemuan Ke</label>
	                        <select name="id_pertemuan" id="" class="form-control">
	                        	@foreach($ajar->pertemuan as $pertemuan)
	                        	<option value="{{$pertemuan->id}}">{{$pertemuan->pertemuan_no}}</option>
	                        	@endforeach
	                        </select>
	                    </div>
						<div class="form-group">
	                        <label for="" class="form-label">Deskripsi Tugas</label>
	                        <textarea rows="5" name="desc" id="" class="form-control"></textarea>
	                    </div>
	                    <div class="form-group">
	                        <button class="btn btn-primary pull-right"><i class="fa fa-save"></i> Submit</button>
	                    </div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@push('custom_script')
<script>
	$('.datetime').datetimepicker({
        daysOfWeekDisabled: [0, 6],
        format: 'DD MMM YYYY HH:mm',
        inline: true,
        sideBySide: true,
    });
    $("#nama").focus();
</script>
@endpush