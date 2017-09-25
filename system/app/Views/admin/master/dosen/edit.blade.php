@extends('template.base.app')

@section('page-header')
  Master Data Dosen
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        Edit Data Dosen
        <div class="card-close">
            <div class="dropdown">
                <button aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" id="closeCard" type="button">
                    <i class="fa fa-ellipsis-v">
                    </i>
                </button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
                    <a href="{{url('admin/master/dosen')}}" class="btn btn-muted btn-sm btn-block text-left"><i class="fa fa-chevron-left"></i> Daftar Dosen</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="{{url("admin/master/dosen/$dosen->id")}}">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">NIK</label>
                        <input type="text" name="nik" value="{{old('nik', $dosen->nik)}}" class="form-control" autofocus onfocus="t=this.value; this.value=''; this.value=t">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" name="nama" value="{{old('nama', $dosen->nama)}}" class="form-control">
                    </div>
                </div>
            </div>
            <hr>
            <small>Account Authentication</small>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">User Auth ID</label>
                        <input type="text" name="userid" value="{{old('userid', $dosen->user->userid)}}" class="form-control" autofocus onfocus="t=this.value; this.value=''; this.value=t">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" value="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">ID Card</label>
                        <input type="text" name="id_card" value="{{old('id_card', $dosen->user->id_card)}}" class="form-control" onkeypress="return (event.keyCode!=13);">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group text-right">
                        <button class="btn btn-primary">Simpan Ubahan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
