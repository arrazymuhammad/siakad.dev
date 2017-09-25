@extends('template.base.app')
@section('page-header')
Master Data Mahasiswa
@endsection
@section('content')
@if(!isset($mahasiswa))
<div class="card">
	<div class="card-header">
		<div class="card-title">
			<h3>
				Master 
				<div class="small">Card Register</div>
			</h3>
		</div>
		<div class="card-close">
			<div class="dropdown">
				<button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
				<div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
				</div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<label for="" class="semi-bold">Scan Kartu</label>
				<input type="text" name="" id="card" class="form-control" onkeypress="scanKelas(event)" autofocus>
			</div>
			<div class="col-md-6">
				<label for="" class="semi-bold">Pilih Kelas</label>
				<select name="kode_mk" id="" class="form-control" onchange="selectKelas(this.value)">
					<option value="">Pilih Kelas</option>
					@foreach($daftar_ajar as $item)
					<option value="{{$item->id_card}}">{{$item->nama}}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
</div>
@include('dosen.mahasiswa.card-register.scan-kartu')
@else
<div class="row">
	@if(isset($mahasiswa_belum_set))
	<div class="col-md-4">
		<div class="card">
			<div class="card-close">
				<div class="dropdown">
					<button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
					<div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
					</div>
				</div>
			</div>
			<div class="card-body">
				<h4><span class="semi-bold">Antrian Mahasiswa</span></h4>
				<small></small>
				<table class="table table-stripped">
					<thead>
						<tr>
							<th>No</th>
							<th>NIM</th>
							<th>Nama</th>
						</tr>
					</thead>
					<tbody>
						@foreach($mahasiswa_belum as $key => $item)
						<tr>
							<td>{{$key+1}}</td>
							<td>{{$item->mahasiswa->nim}}</td>
							<td>{{$item->mahasiswa->nama}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		
		<div class="card">
			<div class="card-close">
				<div class="dropdown">
					<button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
					<div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
					</div>
				</div>
			</div>
			<div class="card-body">
				<h4 class="semi-bold">Set Kartu</h4>
				<small></small>
				<div class="form-group">
					<label for="" class="form-label">NIM</label>
					<input class="form-control" id="scan-belum-nim" value="{{$mahasiswa_belum_set->nim or ""}}" disabled/>
				</div>
				<div class="form-group">
					<label for="" class="form-label">Nama</label>
					<input class="form-control" id="scan-belum-nama" value="{{$mahasiswa_belum_set->nama or ""}}" disabled/>
				</div>
				<div class="form-group">
					<hr>
					<label for="" class="semi-bold">Scan Kartu</label>
					<input type="text" name="" id="scan_belum_id_card" class="form-control" onkeypress="setMahasiswa({{$mahasiswa_belum_set->user->id}},event)" autofocus>
				</div>
				<div class="form-group">
					<hr>
					<button class="btn btn-primary float-right" type="button" onclick="sendSkip()">Skip</button>
				</div>
			</div>
		</div>
	</div>
	@endif
	<div class="col-md-4">
		@include('dosen.mahasiswa.card-register.scan-kartu')
	</div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-close">
				<div class="dropdown">
					<button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
					<div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
					</div>
				</div>
			</div>
			<div class="card-body">
				<h4><span class="semi-bold">List Mahasiswa</span></h4>
				<div class="row">
					<table class="table table-stripped ">
						<thead>
							<tr>
								<th>No</th>
								<th>NIM</th>
								<th>Nama</th>
								<th width="50px">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($mahasiswa as $key => $item)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$item->nim}}</td>
								<td>{{$item->nama}}</td>
								<td class="text-center">
									@if($item->user->id_card == "skip")
									<button class="btn btn-primary btn-sm" onclick="setKartu({{$item->nim}}, '{{$item->nama}}')"><i class="fa fa-plus"></i> Set Kartu</button>
									@elseif($item->user->id_card)
									<button class="btn btn-info btn-sm" onclick="infoKartu({{$item->user->id}},{{$item->nim}}, '{{$item->nama}}', '{{$item->user->id_card}}')"><i class="fa fa-info"></i></button>
									@else
									<button class="btn btn-primary btn-sm" onclick="setKartu({{$item->nim}}, '{{$item->nama}}')"><i class="fa fa-plus"></i> Set Kartu</button>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
<div class="modal fade bd-example-modal-sm" id="set-kartu-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title">Set Kartu</h5>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<input type="hidden" name="user_id" id="modal_team_user_id">
					<div class="form-group">
						<label for="" class="control-label col-md-4">
						NIM
						</label>
						<div class="col-md-8">
							<input class="form-control" id="modal_id_user" type="text" readonly/>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-4">
						Nama
						</label>
						<div class="col-md-8">
							<input class="form-control" id="modal_name" type="text" readonly/>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-4">
						Nomor Kartu
						</label>
						<div class="col-md-8">
							<input class="form-control" id="modal_id_card" onkeypress="setKartuMahasiswa(event)" type="text" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">Tutup</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bd-example-modal-sm" id="info-kartu-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title">Set Kartu</h5>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<input type="hidden" name="user_id" id="modal_team_user_id">
					<div class="form-group">
						<div class="col-md-12 text-right">
							<button class="btn btn-sm btn-warning" onclick="$('#modal_info_id_card').val('').focus()"><i class="fa fa-times"></i> Hapus No Kartu</button>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label for="" class="control-label col-md-4">
							NIM
							</label>
							<div class="col-md-8">
								<input class="form-control" id="modal_info_nim" type="text" readonly/>
								<input type="hidden" name="modal_info_id_user" id="modal_info_id_user">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label for="" class="control-label col-md-4">
							Nama
							</label>
							<div class="col-md-8">
								<input class="form-control" id="modal_info_name" type="text" readonly/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label for="" class="control-label col-md-4">
							Nomor Kartu
							</label>
							<div class="col-md-8">
								<input class="form-control" id="modal_info_id_card" onkeypress="gantiKartuMahasiswa(event)" type="text" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">Tutup</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('custom_script')
<script>
	function sendSkip(){
		var e = jQuery.Event("keypress");
		e.which = 13; 
		e.keyCode = 13;
		$("#scan_belum_id_card").val("skip");
		$("#scan_belum_id_card").trigger(e);
	}
	function scanKelas(e) {
		if (e.keyCode == 13) {
	        id_card = $("#card").val();
	        selectKelas(id_card);
	    }
	}
	function selectKelas(id) {
		$.ajax({
	        url : "{{url('api/ajar/')}}/"+id,
	        success : function(result) {
	        	url = "{{url('mahasiswa/card-register')}}";
	        	if(result){
	        		url+="/"+result.id_kelas;
	        	}
	        	window.location.href = url;
	        }
	    })
	}
	function setKartu(id, nama) {
		$("#modal_id_user").val(id);
		$("#modal_name").val(nama);
		$("#set-kartu-modal").modal("show");
		
	}
	function infoKartu(id,nim, nama, id_card) {
		$("#modal_info_id_user",).val(id);
		$("#modal_info_nim",).val(nim);
		$("#modal_info_name").val(nama);
		$("#modal_info_id_card").val(id_card);
		$("#info-kartu-modal").modal("show");
	}
	function setMahasiswa(id, e) {
		if (e.keyCode == 13) {
	        id_card = $("#scan_belum_id_card").val();
	        console.log(id_card)
			ajaxSetKartu(id,id_card);
	    }
	}
	function setKartuMahasiswa(e) {
		if (e.keyCode == 13) {
	        id 	= $("#modal_id_user").val();
			id_card = $("#modal_id_card").val();
			ajaxSetKartu(id,id_card);
	    }
	}
	function gantiKartuMahasiswa(e) {
		if (e.keyCode == 13) {
	        id 	= $("#modal_info_id_user").val();
			id_card = $("#modal_info_id_card").val();
			
		$.ajax({
			url : "{{url('api/card')}}/"+id_card,
	        method : "patch",
	        data : {
	        	id_user : id,
	        	id_card : id_card
	        },
	        success : function(result) {
	        	if(result === "true"){
	        		$('#modal_info_id_card').notify("Kartu Tersimpan", "success");
	        	}else {
	        		$('#modal_info_id_card').notify(result, "error");
	        	}
	        	setTimeout(function(){ location.reload(); }, 150);
	        }
	    })
	    }
	}
	function ajaxSetKartu(id, id_card) {
		$.ajax({
	        url : "{{url('api/card')}}",
	        method : "post",
	        data : {
	        	id_user : id,
	        	id_card : id_card
	        },
	        success : function(result) {
	        	if(result === "true"){
	        		$('#scan_belum_id_card').notify("Kartu Tersimpan", "success");
	        		$('#modal_id_card').notify("Kartu Tersimpan", "success");
	        	}else {
	        		$('#scan_belum_id_card').notify(result, "error");
					$('#modal_id_card').notify(result, "error");
	        	}
	        	setTimeout(function(){ location.reload(); }, 150);
	        }
	    })
	}
	$('#set-kartu-modal').on('shown.bs.modal', function() {
	  $("#modal_id_card").focus();
	})
	
</script>
@endpush
@section('custom_css')
<style>
	.form-horizontal{
	display: block !important;
	}
	.m-min-200{
	margin-top: -200px !important;
	}
</style>
@endsection