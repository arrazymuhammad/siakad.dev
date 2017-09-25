@extends('template.base.app')

@section('page-header')
  Master Data Dosen
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Detail Data Dosen
        <div class="card-close">
            <div class="dropdown">
                <button aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" id="closeCard" type="button">
                    <i class="fa fa-ellipsis-v"></i>
                </button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
                    <a href="{{url('admin/master/dosen')}}" class="btn btn-muted btn-sm btn-block text-left"><i class="fa fa-chevron-left"></i> Daftar Mahasiswa</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
		<div class="row">
			<div class="col-2 hidden-sm-down">
				<img src="{{url('public')}}/img/avatar-1.jpg" alt="..." class="img-responsive rounded-circle">
			</div>
			<div class="col">
				<dl>
					<dt>Nama</dt>
					<dd>{{$dosen->nama}}</dd>
					<dt>NIK</dt>
					<dd>{{$dosen->nik}}</dd>
				</dl>
			</div>
			<div class="col">
				<dl>
					<dt>No Kartu</dt>
					<dd>{{$dosen->user->id_card}}</dd>
				</dl>
			</div>
		</div>
    </div>
</div>
@endsection