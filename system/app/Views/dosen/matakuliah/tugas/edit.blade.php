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
			<form action="{{url("matakuliah/$ajar->id/tugas/$tugas->id")}}" method="post" class="form-horizontal">
            {{ method_field('PATCH') }}
            {{csrf_field()}}
				<div class="row">
					<div class="col-md-6">
	                    <div class="form-group">
	                        <label for="" class="form-label">Nama Tugas</label>
	                        <input type="text" name="nama" id="nama" class="form-control" value="{{$tugas->nama}}">
	                    </div>
	                    <div class="form-group">
	                        <label for="" class="form-label">Batas Pengumpulan</label>
	                        <input type="text" name="deadline" id="batas_pengumpulan" class="form-control datetime" value="{{$tugas->deadline->format("d M Y H:i")}}">
	                    </div>
	                    <div class="form-group">
	                        <label for="" class="form-label">File Pendukung</label>
	                        <input type="file" name="file" id="batas_pengumpulan" class="form-control">
	                    </div>
	                    
					</div>
					<div class="col-md-6">
						<div class="form-group">
	                        <label for="" class="form-label">Deskripsi Tugas</label>
	                        <textarea rows="10" name="desc" id="" class="form-control">{{$tugas->desc}}</textarea>
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
        defaultDate: "{{date("Y/m/d H:i", strtotime($tugas->deadline))}}",
    });
    $("#nama").focus();
</script>
@endpush