@extends('template.base.app')

@section('page-header')
  Master Data Mahasiswa
@endsection

@section('content')

@if($kelas)
<div class="card">
    <div class="card-header">
        Tambah Mahasiswa
        <div class="card-close">
            <div class="dropdown">
                <button aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" id="closeCard" type="button">
                    <i class="fa fa-ellipsis-v">
                    </i>
                </button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
                    <a href="{{url('admin/master/mahasiswa/create')}}" class="btn btn-muted btn-sm btn-block text-left"><i class="fa fa-chevron-left"></i> Daftar Kelas</a>
                    <a href="{{url('admin/master/mahasiswa')}}" class="btn btn-muted btn-sm btn-block text-left"><i class="fa fa-chevron-left"></i> Daftar Mahasiswa</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="{{url("admin/master/mahasiswa?id_kelas=$kelas->id")}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Angkatan</label>
                        <input type="text" class="form-control" value="{{$kelas->angkatan}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Kelas</label>
                        <input type="text" class="form-control" value="{{$kelas->nama}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">NIM</label>
                        <input type="text" name="nim" value="{{old('nim',"304".$kelas->angkatan)}}" class="form-control" autofocus onfocus="t=this.value; this.value=''; this.value=t">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" name="nama" value="{{old('nama')}}" class="form-control">
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
                    <a href="{{url('admin/master/mahasiswa')}}" class="btn btn-muted btn-sm btn-block text-left"><i class="fa fa-chevron-left"></i> Daftar Mahasiswa</a>
                </div>
            </div>
        </div>
    <div class="card-body">
        <div class="form-group">
            <label for="" class="form-label">Pilih Kelas</label>
            <select name="" id="" class="form-control" onchange="pilihkelas(this.value)">
                <option value="">Pilih Kelas</option>
                @foreach($kelas_all as $key => $item)
                    <option value="{{$item->id}}">{{$item->angkatan." ".$item->nama}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
</div>
@endif
@endsection

@section('custom_script')
    <script>
        function pilihkelas(id) {
            window.location.href = "{{url('admin/master/mahasiswa/create?id_kelas=')}}"+id
        }
    </script>
@endsection
