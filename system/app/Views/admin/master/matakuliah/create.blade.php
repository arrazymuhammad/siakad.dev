@extends('template.base.app')

@section('page-header')
  Master Data Mata Kuliah
@endsection

@section('content')

@if($semester)
<div class="card">
    <div class="card-header">
        Tambah Mata Kuliah
        <div class="card-close">
            <div class="dropdown">
                <button aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" id="closeCard" type="button">
                    <i class="fa fa-ellipsis-v">
                    </i>
                </button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
                    <a href="{{url('admin/master/matakuliah/create')}}" class="btn btn-muted btn-sm btn-block text-left"><i class="fa fa-chevron-left"></i> Daftar Semester</a>
                    <a href="{{url('admin/master/matakuliah')}}" class="btn btn-muted btn-sm btn-block text-left"><i class="fa fa-chevron-left"></i> Daftar Mata Kuliah</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="{{url("admin/master/matakuliah?semester=$semester")}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="" class="form-label">Semester</label>
                        <input type="text" class="form-control" value="Semester {{$semester}}" name="" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="" class="form-label">Kode MK</label>
                        <input type="text" class="form-control" value="{{old('kode')}}" name="kode" autofocus onfocus="t=this.value; this.value=''; this.value=t">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="" class="form-label">SKS</label>
                        <input type="text" name="sks" value="{{old('sks')}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="" class="form-label">Jenis MK</label>
                        <select name="jenis_mk" id="jenis_mk" class="form-control" onchange="pilihJenisMk(this.value)">
                            <option value="1" @if(old('jenis_mk') == 1) selected @endif>Teori</option>
                            <option value="2" @if(old('jenis_mk') == 2) selected @endif>Praktikum</option>
                            <option value="3" @if(old('jenis_mk') == 3) selected @endif>Teori Praktikum</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Nama MK</label>
                        <input type="text" name="nama" value="{{old('nama')}}" class="form-control" >
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6" id="mk_teori">
                    <div class="form-group">
                        <label for="" class="form-label">Jam Teori</label>
                        <input type="text" name="jam_teori" value="{{old('jam_teori')}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6" id="mk_praktikum">
                    <div class="form-group">
                        <label for="" class="form-label">Jam Praktikum</label>
                        <input type="text" name="jam_praktikum" value="{{old('jam_praktikum')}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group text-right">
                        <button class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@else
<div class="col-lg-6 offset-lg-3">
    
<div class="card">
        <div class="card-close">
            <div class="dropdown">
                <button aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" id="closeCard" type="button">
                    <i class="fa fa-ellipsis-v">
                    </i>
                </button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
                    <a href="{{url('admin/master/matakuliah')}}" class="btn btn-muted btn-sm btn-block text-left"><i class="fa fa-chevron-left"></i> Daftar Mata Kuliah</a>
                </div>
            </div>
        </div>
    <div class="card-body">
        <div class="form-group">
            <label for="" class="form-label">Pilih Semester</label>
            <select name="" id="" class="form-control" onchange="pilihSemester(this.value)">
                <option value="">Pilih Semester</option>
                @for($i = 1; $i<=6; $i++){
                    <option value="{{$i}}">{{"Semester $i"}}</option>
                }
                @endfor
            </select>
        </div>
    </div>
</div>
</div>
@endif
@endsection

@section('custom_script')
    <script>
        function pilihSemester(id) {
            window.location.href = "{{url('admin/master/matakuliah/create?semester=')}}"+id
        }
        function pilihJenisMk(id) {
            if(id == 1){
                $("#mk_teori").show();
                $("#mk_praktikum").hide();
            } else if(id == 2){
                $("#mk_teori").hide();
                $("#mk_praktikum").show();
            } else{
                $("#mk_teori").show();
                $("#mk_praktikum").show();
            } 
        }
        pilihJenisMk($("#jenis_mk").val());
    </script>
@endsection
