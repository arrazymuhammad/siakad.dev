@extends('template.base.app')

@section('page-header')
	Dosen Pengampu
@endsection

@section('content')
<div class="row">
		<div class="col">	
			<div class="card">
				<div class="card-header">
					<div class="card-title">
						Daftar Mata Kuliah
					</div>
				</div>
				<div class="card-body"></div>
			</div>
		</div>
		<div class="col-md-4 hidden-sm-down">
			<div class="card">
				<div class="card-header">
					<div class="card-title">
						Daftar Dosen
					</div>
				</div>
				<div class="card-body">
					@foreach($dosen as $item)
						<li>{{$item->nama}}</li>
					@endforeach
				</div>
			</div>
		</div>
</div>
@endsection