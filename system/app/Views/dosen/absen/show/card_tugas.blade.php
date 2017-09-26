<div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="semi-bold h3">Tugas</div>
                    <div class="semi-bold h5">Pertemuan Ke - {{$pertemuan->pertemuan_no}}</div>
                    <div class="card-close">
                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if($pertemuan->tugas)
                    <dl class="dl-horizontal text-justify">
                        <dt>Nama Tugas</dt>
                        <dd>{{$pertemuan->tugas->nama}}</dd>
                        <dt>Batas Pengumpulan</dt>
                        <dd>{{$pertemuan->tugas->deadline->diffForHumans()}}</dd>
                        <dt>Deskripsi Tugas</dt>
                        <dd>{{$pertemuan->tugas->desc}}</dd>
                        <dt>File Pendukung</dt>
                        <dd><a href="{{url("download/tugas")."/".$pertemuan->tugas->id}}" class="btn btn-link">Download</a></dd>
                    </dl>
                @else
                <form action="{{url("matakuliah")."/".$pertemuan->ajar->id."/tugas"}}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <input type="hidden" name="id_pertemuan" value="{{$pertemuan->id}}">
                    <div class="form-group">
                        <label for="" class="form-label">Nama Tugas</label>
                        <input type="text" name="nama" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Batas Pengumpulan</label>
                        <input type="text" name="deadline" id="batas_pengumpulan" class="form-control datetime">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">File Pendukung</label>
                        <input type="file" name="file"  class="form-control ">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Deskripsi Tugas</label>
                        <textarea name="desc" id="" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary pull-right"><i class="fa fa-save"></i> Submit</button>
                    </div>
                </form>
                @endif
            </div>
        </div>