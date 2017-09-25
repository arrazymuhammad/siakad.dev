<div class="card">
	<div class="card-close">
		<button class="btn btn-muted" onclick="reset_scan()"><i class="fa fa-times"></i> Reset </button>
	</div>
	<div class="card-body">
		<h4><span class="semi-bold">Cek Kartu</span></h4>
		<div class="form-group">
			<label for="" class="semi-bold">Scan Kartu</label>
			<input type="text" name="" id="scan_id_card" class="form-control" onkeypress="scanMahasiswa(event, this.value)">
			<hr>
		</div>
		<div id="kartu-mahasiswa">
			<div class="form-group">
				<label for="" class="form-label">NIM</label>
				<input class="form-control" id="scan-nim" disabled>
			</div>
			<div class="form-group">
				<label for="" class="form-label">Nama</label>
				<input class="form-control" id="scan-nama-mahasiswa" disabled>
			</div>
		</div>
		<div id="kartu-dosen">
			<div class="form-group">
				<label for="" class="form-label">NIK</label>
				<input class="form-control" id="scan-nik" disabled>
			</div>
			<div class="form-group">
				<label for="" class="form-label">Nama</label>
				<input class="form-control" id="scan-nama-dosen" disabled>
			</div>
		</div>
		<div id="kartu-admin">
			<div class="form-group">
				<label for="" class="form-label">Nama</label>
				<input class="form-control" id="scan-nama-admin" disabled>
			</div>
		</div>
		<div id="kartu-matakuliah">
			<div class="form-group">
				<label for="" class="form-label">Mata Kuliah</label>
				<input class="form-control" id="scan-matakuliah" disabled>
			</div>
			<div class="form-group">
				<label for="" class="form-label">Dosen Pengampu</label>
				<input class="form-control" id="scan-dosen-pengampu" disabled>
			</div>
			<div class="form-group">
				<label for="" class="form-label">Kelas</label>
				<input class="form-control" id="scan-kelas" disabled>
			</div>
		</div>
		
	</div>
</div>

@push('custom_script')
<script>
	function scanMahasiswa(e, val) {
		if (e.keyCode == 13) {
	        $.ajax({
	        	url : "{{url('api/card')}}/"+val,
	        	success : function(result) {
	        		res = $.parseJSON(result);
					$("#scan_id_card").notify(res.msg, res.status);
					if(res.tipe == 1){
						$("#kartu-mahasiswa").show();
						$("#kartu-dosen").hide();
						$("#kartu-admin").hide();
						$("#kartu-matakuliah").hide();

						$("#scan-nim").val(res.data.nim);
						$("#scan-nama-mahasiswa").val(res.data.nama);
					}else if (res.tipe == 2) {
						$("#kartu-mahasiswa").hide();
						$("#kartu-dosen").show();
						$("#kartu-admin").hide();
						$("#kartu-matakuliah").hide();

						$("#scan-nik").val(res.data.nik);
						$("#scan-nama-dosen").val(res.data.nama);
					} else if (res.tipe == 3) {
						$("#kartu-mahasiswa").hide();
						$("#kartu-dosen").hide();
						$("#kartu-admin").show();
						$("#kartu-matakuliah").hide();

						$("#scan-nama-admin").val(res.data.userid);
					} else if (res.tipe == 4) {
						$("#kartu-mahasiswa").hide();
						$("#kartu-dosen").hide();
						$("#kartu-admin").hide();
						$("#kartu-matakuliah").show();
						$("#scan-matakuliah").val(res.data.matakuliah.nama);

						$("#scan-dosen-pengampu").val(res.data.dosen.nama);
						$("#scan-kelas").val(res.data.kelas.nama);
					}else {

						$("#kartu-mahasiswa").hide();
						$("#kartu-dosen").hide();
						$("#kartu-admin").hide();
						$("#kartu-matakuliah").hide();
					}
	        		
	        		
	        	}
	        })
	    }
	}
	function reset_scan() {
		$("#scan_id_card").val("").focus();
	    $("#kartu-mahasiswa").hide();
		$("#kartu-dosen").hide();
		$("#kartu-admin").hide();
		$("#kartu-matakuliah").hide();
	}
	
	reset_scan()
</script>
@endpush