@extends('template.base.app')
@section('page-header')
Absensi
@endsection
@section('content')
@if($pertemuan->materi == "")
    @include('dosen.absen.content.materi')
@else
<div class="row">
    <div class="col-md-5">
        @include('dosen.absen.content.card_scan')
    </div>
    <div class="col-md-7">
        @include('dosen.absen.content.card_mahasiswa_belum_hadir')
        @include('dosen.absen.content.card_mahasiswa_berhalangan_hadir')
        @include('dosen.absen.content.card_mahasiswa_hadir')
    </div>
</div>

        @include('dosen.absen.content.modal_info_absensi')
        @include('dosen.absen.content.modal_set_absensi')

@endif
@endsection
@section('custom_script')
<script>
    
    function getDataResource(){
        $.ajax({
            url : '{{url('api/pertemuan')."/".$pertemuan->id}}',
            success : function(result){
                renderMahasiswaBelumHadir(result.mahasiswa_belum_hadir);
                renderMahasiswaBerhalanganHadir(result.absen_mahasiswa_berhalangan_hadir);
                renderMahasiswaHadir(result.absen_mahasiswa_hadir);
                renderMahasiswaHadirDaftar(result.absen_mahasiswa_hadir_daftar);
                $("#modal_set_form").trigger("reset");
                $("#modal_info_form").trigger("reset");
            }
        })
    }
    function renderMahasiswaBelumHadir(mahasiswa) {
        table_data = "";
        for(i in mahasiswa){
            tropen = "<tr";
            if(mahasiswa[i].user.id_card == null || mahasiswa[i].user.id_card =="skip"){
                tropen+=" class='bg-danger text-white'";
            } else if(mahasiswa[i].kehadiran < 80){
                tropen+=" class='bg-warning text-white'";
            }
            tropen+=">";
            trclose = "</tr>";
            tdnumber = "<td>"+(parseInt(i)+1)+"</td>";
            tdnim = "<td>"+mahasiswa[i].nim+"</td>";
            tdnama = "<td>"+mahasiswa[i].nama+"</td>";
            tdkehadiran = "<td>"+mahasiswa[i].kehadiran+"%</td>";
            if(mahasiswa[i].user.id_card == null || mahasiswa[i].user.id_card == "skip"  ){
                tdopsi = '<td><a href="{{url("mahasiswa/card-register")."/".$pertemuan->ajar->id}}" class="btn btn-primary btn-sm"><i class="fa fa-credit-card"></i></a></td>';
            }else{
                tdopsi = '<td><button class="btn btn-warning" onclick="setStatus('+mahasiswa[i].nim+',\''+mahasiswa[i].user.id_card+'\',\''+mahasiswa[i].nama+'\')"><i class="fa fa-warning"></i></button></td>';
            }
            table_row = tropen+tdnumber+tdnim+tdnama+tdkehadiran+tdopsi+trclose;
            table_data+=table_row;
        }
        $("#mahasiswa-belum-hadir").html(table_data);
    }
    function renderMahasiswaBerhalanganHadir(absen) {
        table_data = "";
        for(i in absen){
            tropen = "<tr";
            if(absen[i].mahasiswa.kehadiran < 80) tropen+=" class='bg-warning text-white'";
            tropen+=">";
            trclose = "</tr>";
            tdnumber = "<td>"+(parseInt(i)+1)+"</td>";
            tdnim = "<td>"+absen[i].mahasiswa.nim+"</td>";
            tdnama = "<td>"+absen[i].mahasiswa.nama+"</td>";
            tdstatus = "<td>"+((absen[i].status == 2) ? 'Sakit' : 'Izin') +"</td>";
            tdkehadiran = "<td>"+absen[i].mahasiswa.kehadiran+"</td>";
            tdopsi = '<td><button class="btn btn-info" onclick="infoStatus('+absen[i].id+',\''+absen[i].mahasiswa.nim+'\',\''+absen[i].mahasiswa.nama+'\','+absen[i].status+')"><i class="fa fa-warning"></i></button></td>';
            table_row = tropen+tdnumber+tdnim+tdnama+tdstatus+tdkehadiran+tdopsi+trclose;
            table_data+=table_row;
        }
        $("#mahasiswa-berhalangan-hadir").html(table_data);
    }
    function renderMahasiswaHadir(absen) {
        table_data = "";
        for(i in absen){
            tropen = "<tr";
            if(absen[i].mahasiswa.kehadiran < 80) tropen+=" class='bg-warning text-white'";
            tropen+=">";
            trclose = "</tr>";
            tdnumber = "<td>"+(parseInt(i)+1)+"</td>";
            tdnim = "<td>"+absen[i].mahasiswa.nim+"</td>";
            tdnama = "<td>"+absen[i].mahasiswa.nama+"</td>";
            tdkehadiran = "<td>"+absen[i].mahasiswa.kehadiran+"</td>";
            tdopsi = '<td><button class="btn btn-info" onclick="infoStatus('+absen[i].id+',\''+absen[i].mahasiswa.nim+'\',\''+absen[i].mahasiswa.nama+'\','+absen[i].status+')"><i class="fa fa-warning"></i></button></td>';
            table_row = tropen+tdnumber+tdnim+tdnama+tdkehadiran+tdopsi+trclose;
            table_data+=table_row;
        }
        $("#mahasiswa-hadir").html(table_data);
        
    }
    function renderMahasiswaHadirDaftar(absen) {
        table_data = "";
        for(i in absen){
            tropen = "<tr";
            if(absen[i].mahasiswa.kehadiran < 80) tropen+=" class='bg-danger text-white'";
            tropen+=">";
            trclose = "</tr>";
            tdnumber = "<td>"+(parseInt(i)+1)+"</td>";
            tdnim = "<td>"+absen[i].mahasiswa.nim+"</td>";
            tdnama = "<td>"+absen[i].mahasiswa.nama+"</td>";
            tdkehadiran = "<td>"+absen[i].mahasiswa.kehadiran+"</td>";
            table_row = tropen+tdnumber+tdnim+tdnama+tdkehadiran+trclose;
            table_data+=table_row;
        }
        $("#mahasiswa-absen-daftar").html(table_data);
        
    }
    getDataResource();
    function scanMahasiswa(e) {
        if (e.keyCode == 13) {
            id_card = $("#id_card").val();
            ajaxSimpan($("#id_card"),id_card);
            setTimeout(function() {
                    $("#id_card").val("").focus();
                }, 250);
        }
    }

    function setStatus(id, id_card, nama) {
        $("#modal_id_user").val(id);
        $("#modal_id_card").val(id_card);
        $("#modal_name").val(nama);
        $("#set-mahasiswa-modal").modal("show");
    }

    function setKeterangan(status) {
        id_card = $("#modal_id_card").val();
        ajaxSimpan($("#modal_id_user"),id_card,status,function(res){
            $("#set-mahasiswa-modal").modal('hide');
        });
    }
    function ajaxSimpan(parent,id_card,status,cb){
        $.ajax({
            url: '{{url("api/absen")}}',
            method : "post",
            data : {
                id_pertemuan : {{$pertemuan->id}},
                id_card : id_card,
                status : status
            },
            success: function(result) {
                data = $.parseJSON(result);
                parent.notify(data.data,  {showDuration : 100, hideDuration: 100,position : "right", className: data.status});

                setTimeout(function() {
                    getDataResource();
                    if (typeof cb === "function") {
                        return cb("true")
                    }
                }, 250);
                
            }
        })
    }
    function infoStatus(id, nim, nama, status) {
        if (status == 1) {
            $("#info_alasan_1").attr("checked", "true");
            $("#modal_info_status").val("Hadir")
        } else if (status == 2) {
            $("#info_alasan_2").attr("checked", "true");
            $("#modal_info_status").val("Sakit")
        } else {
            $("#info_alasan_3").attr("checked", "true");
            $("#modal_info_status").val("Izin")
        }

        $("#modal_info_id_user").val(nim)
        $("#modal_info_id_absen").val(id)
        $("#modal_info_nama").val(nama)
        $("#info-mahasiswa-modal").modal("show");
    }

    function setInfoKeterangan(status) {
        id_absen = $("#modal_info_id_absen").val();

        $.ajax({
            url: '{{url("api/absen")}}/'+id_absen,
            method : "patch",
            data : {
                status : status
            },
            success: function(result) {
                data = $.parseJSON(result);
                $("#modal_info_nama").notify(data.data,  {showDuration : 100, position : "right", className: data.status, css : "z-index:9999999"});
                setTimeout(function() {
                    getDataResource();
                    $("#info-mahasiswa-modal").modal('hide');
                }, 100);
            }
        })
    }
</script>
@endsection
@section('custom_css')
    <style>
        .form-horizontal{
        display: block !important;
    }
</style>
@endsection