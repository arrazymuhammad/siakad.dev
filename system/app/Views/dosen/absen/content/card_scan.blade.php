<div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="semi-bold h3">{{$pertemuan->ajar->nama}}</div>
                    <div class="semi-bold h5">Pertemuan Ke - {{$pertemuan->pertemuan_no}}</div>
                    <div class="card-close">
                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4><span class="semi-bold">Scan Kartu</span></h3>
                <input type="text" name="id_card" id="id_card" class="form-control" onkeypress="scanMahasiswa(event)" autofocus>
                <hr>
                <small class="semi-bold">Absensi Terakhir</small>
                <div class="col-md-12">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody id="mahasiswa-absen-daftar">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>