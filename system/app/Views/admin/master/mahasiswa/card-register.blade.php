@extends('template.base.app')

@section('page-header')
Master Data Mahasiswa
@endsection

@section('content')

	
		@if(!isset($mahasiswa))
		<div class="card">
			<div class="card-close">
				<div class="dropdown">
					<button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
					<div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
						
					</div>
				</div>
			</div>
			<div class="card-body">
				<h3>Master <div class="small">Card Register</div></h3>
				<div class="row">
					<div class="col-md-6">
						<label for="" class="semi-bold">Scan Kartu</label>
						<input type="text" name="" id="card" class="form-control" onkeypress="scanKelas(event)" autofocus>
					</div>
					<div class="col-md-6">
						<label for="" class="semi-bold">Pilih Kelas</label>
						<select name="kode_mk" id="" class="form-control" onchange="selectKelas(this.value)">
							<option value="">Pilih Kelas</option>
							@foreach($kelas as $item)
							<option value="{{$item->id_card}}">{{$item->nama}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		</div>
		@else
		<div class="row">
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
						<table class="table table-stripped table-datatable">
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
									<td>{{$item->nim}}</td>
									<td>{{$item->nama}}</td>
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
							<input class="form-control" id="scan-belum-nim" value="{{$mahasiswa_belum_set->nim or ""}}" disabled></input>
						</div>
						<div class="form-group">
							<label for="" class="form-label">Nama</label>
							<input class="form-control" id="scan-belum-nama" value="{{$mahasiswa_belum_set->nama or ""}}" disabled></input>
						</div>
						<div class="form-group">
						<hr>
							<label for="" class="semi-bold">Scan Kartu</label>
							<input type="text" name="" id="scan_belum_id_card" class="form-control" onkeypress="setMahasiswa({{$mahasiswa_belum_set->nim or ""}},event)" autofocus>
						</div>
					</div>
				</div>
			</div>
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
						<h4><span class="semi-bold">Cek Kartu</span></h4>
						<div class="form-group">
							<label for="" class="semi-bold">Scan Kartu</label>
							<input type="text" name="" id="scan_id_card" class="form-control" onkeypress="scanMahasiswa(event)">
						<hr>	
						</div>
						<div class="form-group">
							<label for="" class="form-label">NIM</label>
							<input class="form-control" id="scan-nim" disabled></input>
						</div>
						<div class="form-group">
							<label for="" class="form-label">Nama</label>
							<input class="form-control" id="scan-nama" disabled></input>
						</div>
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
						<h4><span class="semi-bold">List Mahasiswa</span></h4>
						<div class="row">
							<table class="table table-stripped table-datatable">
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
											@if($item->id_card == "skip")
												<button class="btn btn-primary" onclick="setKartu({{$item->nim}}, '{{$item->nama}}')"><i class="fa fa-plus"></i> Set Kartu</button>
											@elseif($item->id_card)
												<button class="btn btn-info" onclick="infoKartu({{$item->nim}}, '{{$item->nama}}', {{$item->id_card}})"><i class="fa fa-info"></i></button>
											@else
												<button class="btn btn-primary" onclick="setKartu({{$item->nim}}, '{{$item->nama}}')"><i class="fa fa-plus"></i> Set Kartu</button>
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
			@endif
		</div>
	
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
									<input class="form-control" id="modal_info_id_user" type="text" readonly/>
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

@section('custom_script')
	<script>
		function scanKelas(e) {
			if (e.keyCode == 13) {
		        id_card = $("#card").val();
		        selectKelas(id_card);
		    }
		}
		function selectKelas(id) {
			$.ajax({
		        url : "{{url('master/mahasiswa/get-card')}}/"+id,
		        success : function(result) {
		        	data = "{{url('master/mahasiswa/card-register')}}";
		        	if(result){
		        		data+="/"+result;
		        	}
		        	window.location.href = data;
		        }
		    })
		}
		function setKartu(id, nama) {
			$("#modal_id_user").val(id);
			$("#modal_name").val(nama);
			$("#set-kartu-modal").modal("show");
			
		}
		function infoKartu(id, nama, id_card) {
			$("#modal_info_id_user",).val(id);
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
		        url : "{{url('master/mahasiswa/update-card')}}/"+id+"/"+id_card,
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
		        url : "{{url('master/mahasiswa/set-card')}}/"+id+"/"+id_card,
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
		function scanMahasiswa(e) {
			if (e.keyCode == 13) {
		        scan_id_card = $("#scan_id_card").val();
		        $.ajax({
		        	url : "{{url('master/mahasiswa/get-by-card')}}/"+scan_id_card,
		        	success : function(result) {
		        		if(result === "false"){
							$("#scan_id_card").notify("Kartu tidak valid", "error");
		        		}else {
		        			$("#scan_id_card").notify("Kartu Valid", "success");
		        			mhs = $.parseJSON(result);
		        			$("#scan-nim").val(mhs.nim);
		        			$("#scan-nama").val(mhs.nama);
		        		}
		        		setTimeout(function(){ reset_scan() }, 2000);
		        		
		        	}
		        })
		    }
		}
		function reset_scan() {
			$("#scan_id_card").val("");
			$("#scan-nim").val("");
		    $("#scan-nama").val("");
		}
	</script>
@endsection

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
