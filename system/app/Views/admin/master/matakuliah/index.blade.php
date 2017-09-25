@extends('template.base.app')
@section('page-header')
Master Data
@endsection
@section('content')


<div class="card">
	<div class="card-header">
		Master Data Mata Kuliah
		<div class="card-close">
			<div class="dropdown">
				<button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
				<div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
					<a href="{{url('admin/master/matakuliah/create')}}" class="btn btn-sm btn-block text-left p10 "><i class="fa fa-plus"></i> Tambah Mata Kuliah</a>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="col-6">
			<div class="form-group">
	            <label for="" class="form-label">Pilih Semester</label>
	            <select name="" id="" class="form-control" onchange="pilihSemester(this.value)">
	                <option value="">Pilih Semester</option>
	                @for($i = 1; $i<=6; $i++){
	                    <option value="{{$i}}">{{"Semester $i"}}</option>
	                }
	                @endfor
	                <option value="all">Semua Semester</option>
	            </select>
	        </div>
		</div>
		<div class="table-responsive">
			<table class="table table-stripped table-datatable">
				<thead>
					<tr>
						<th>No</th>
						<th width="50px">Semester</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>SKS</th>
						<th>Jenis MK</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($matakuliah as $key => $item)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$item->semester}}</td>
						<td>{{$item->kode}}</td>
						<td>{{$item->nama}}</td>
						<td>{{$item->sks}}</td>
						<td>{{$item->jenis_mk}}</td>
						<td class="text-right">
							<a href="{{url('admin/master/matakuliah')}}/{{$item->id}}" class="btn btn-sm btn-info"><i class="fa fa-info"></i></a>
							<a href="{{url('admin/master/matakuliah')}}/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
							<a href="{{url('admin/master/matakuliah')}}/{{$item->id}}" class="btn btn-sm btn-danger" data-method="delete" data-confirm="Yakin Menghapus Data ini?"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection


@section('custom_script')
    <script>
        function pilihSemester(id) {
        	if(id == "all"){
	            window.location.href = "{{url('admin/master/matakuliah')}}"
        	}else{
	            window.location.href = "{{url('admin/master/matakuliah?semester=')}}"+id
        	}
        }
    </script>
@endsection
