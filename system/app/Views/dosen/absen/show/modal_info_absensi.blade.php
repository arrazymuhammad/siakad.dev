<div class="modal fade bd-example-modal-sm" id="info-mahasiswa-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Info Mahasiswa</h5>
            </div>
            <div class="modal-body">
                <form id="modal_info_form"    class="form-horizontal">
                    <div class="form-group">
                        <label for="" class="control-label col-md-4">
                            NIM
                        </label>
                        <div class="col-md-8">
                            <input class="form-control" id="modal_info_id_user" type="text" readonly/>
                            <input class="form-control" id="modal_info_id_absen" type="hidden" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-4">
                            Nama
                        </label>
                        <div class="col-md-8">
                            <input class="form-control" id="modal_info_nama" type="text" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-4">
                            Status
                        </label>
                        <div class="col-md-8">
                            <input class="form-control" id="modal_info_status" type="text" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-4">
                            Keterangan
                        </label>
                        <div class="col-md-8">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="radio" class="" name="info_alasan" id="info_alasan_1" value="1" onclick="setInfoKeterangan(1)">
                                    <label for="" class="form-label">Hadir</label>
                                </div>
                                <div class="form-group">
                                    <input type="radio" class="" name="info_alasan" id="info_alasan_2" value="2" onclick="setInfoKeterangan(2)">
                                    <label for="" class="form-label">Sakit</label>
                                </div>
                                <div class="form-group">
                                    <input type="radio" class="" name="info_alasan" id="info_alasan_3" value="3" onclick="setInfoKeterangan(3)">
                                    <label for="" class="form-label">Izin</label>
                                </div>
                                <div class="form-group">
                                    <input type="radio" class="" name="info_alasan" id="info_alasan_3" value="3" onclick="setInfoKeterangan(0)">
                                    <label for="" class="form-label">Tidak Hadir</label>
                                </div>
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
                </form>
            </div>
        </div>
    </div>
</div>