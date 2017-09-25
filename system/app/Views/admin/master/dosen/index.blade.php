@extends('template.base.app')
@section('page-header')
Master Data Dosen
@endsection
@section('content')


<div class="card">
	<div class="card-header">
		Master Data Dosen
		<div class="card-close">
			<div class="dropdown">
				<button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
				<div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
					<a href="{{url('admin/master/dosen/create')}}" class="btn btn-sm btn-block text-left p10 "><i class="fa fa-plus"></i> Tambah Dosen</a>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-stripped table-datatable">
				<thead>
					<tr>
						<th width="100px">No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th width="150px">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($dosen as $key => $item)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$item->nik}}</td>
						<td>{{$item->nama}}</td>
						<td class="text-right">
							<a href="{{url('admin/master/dosen')}}/{{$item->id}}" class="btn btn-sm btn-info"><i class="fa fa-info"></i></a>
							<a href="{{url('admin/master/dosen')}}/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
							<a href="{{url('admin/master/dosen')}}/{{$item->id}}" class="btn btn-sm btn-danger" data-method="delete" data-confirm="Yakin menghapus data ini?"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection