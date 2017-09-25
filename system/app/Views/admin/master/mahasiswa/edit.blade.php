@extends('template.base.app')

@section('page-header')
  Master Data Mahasiswa
@endsection

@section('content')

@if($mahasiswa)
<div class="card">
    <div class="card-header">
        Edit Mahasiswa
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
        <form class="form-horizontal" method="post" action="{{url("admin/master/mahasiswa/$mahasiswa->id")}}">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Kelas</label>
                        <select name="id_kelas" id="" class="form-control">
                            @foreach($kelas as $item)
                                <option value="{{$item->id}}" @if($mahasiswa->id_kelas == $item->id) selected @endif>{{$item->angkatan." ".$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">NIM</label>
                        <input type="text" name="nim" value="{{$mahasiswa->nim}}" class="form-control"  class="form-control" autofocus onfocus="t=this.value; this.value=''; this.value=t">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" name="nama" value="{{old('nama', $mahasiswa->nama)}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group text-right">
                        <button class="btn btn-primary">Simpan Ubahan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endif
@endsection
