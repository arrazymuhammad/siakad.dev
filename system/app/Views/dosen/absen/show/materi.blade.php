<div class="card">
    <div class="card-close">
        
    </div>
    <div class="card-body">
        <div class="semi-bold h3">{{$pertemuan->ajar->nama}}</div>
        <div class="semi-bold h5"><span>Pertemuan Ke - {{$pertemuan->pertemuan_no}}</span></div>
        <form action="{{url('absen')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <input type="hidden" name="id_pertemuan" value="{{$pertemuan->id}}">
            <div class="form-group">
                <label for="" class="form-label">Materi Pertemuan</label>
                <textarea name="materi" id="" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>