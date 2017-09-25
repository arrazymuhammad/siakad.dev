@extends('template.base.app')

@section('page-header')

Absensi

@endsection


@section('content')

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header" id="card_absen_scan">
                <div class="card-title">
                    Scan Kartu atau Pilih Kelas
                </div>
                <div class="card-close">
                    <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h3><span class="semi-bold">Scan Kartu</span></h3>
                <input type="text" name="kode_mk" id="kode_mk" class="form-control" onkeypress="scanKelas(event)" autofocus>
                <hr>
                <h3><span class="semi-bold">Pilih Kelas</span></h3>
                <select name="kode_mk" id="" class="form-control" onchange="selectKelas(this.value)">
                    <option value="">Pilih Kelas</option>
                    @foreach($ajar as $item)
                    <option value="{{$item->id_card}}">{{$item->nama}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title" >
                    Daftar Pertemuan
                </div>
                <div class="card-close">
                    <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow" style="display: none;">
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h3><span class="semi-bold">Daftar Pertemuan</span></h3>
                <table class="table table-datatable table-stripped">
                    <thead>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Jam Ke</th>
                        <th>Kelas</th>
                        <th>Pertemuan Ke</th>
                        <th>Kehadiran</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($ajar->pluck('pertemuan')->flatten()->sortByDesc('created_at')->values() as $key => $item)
                            @php   

                            $item->created_at->setlocale(LC_TIME, 'IDN');
                            @endphp
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->created_at->formatLocalized("%A, %d %b")}}</td>
                                <td>{{$item->created_at->format("H:i")}}</td>
                                <td>{{$item->jam_ke}}</td>
                                <td>{{$item->ajar->nama}}</td>
                                <td>{{$item->pertemuan_no}}</td>
                                <td>{{$item->kehadiran}}%</td>
                                <td><a href="{{url("dosen/absen/$item->id")}}" class="btn btn-sm btn-primary float-right"><i class="fa fa-chevron-right"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_script')
    <script>
        function scanKelas(e) {
            if (e.keyCode == 13) {
                id_card = $("#kode_mk").val();
                // alert(id_card)
                selectKelas(id_card);

            }
        }
        function selectKelas(id) {
            $.ajax({
                url: '{{url("api/pertemuan")}}',
                method : "post",
                data : {
                    id_card : id,
                },
                success : function(result) {
                    console.log(result);
                    url = "{{url('dosen/absen')}}";
                    data = $.parseJSON(result);
                    url+=data.url;
                    $("#card_absen_scan").notify(data.msg, data.status);
                    setTimeout(function(){ window.location.href = url; }, 250);
                    
                }
            })
        }
    </script>
@endsection