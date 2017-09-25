<?php

namespace App\Model\Tr;

use App\Model\Tr\Tugas;
use Illuminate\Database\Eloquent\Model;

class Ajar extends Model
{
    protected $table = 'tr_ajar';


    public function Pertemuan()
    {
        return $this->hasMany('\App\Model\Tr\Pertemuan', 'id_ajar','id');
    }

    public function Tugas()
    {
        return $this->hasMany('\App\Model\Tr\Tugas', 'id_ajar','id');
    }
    
    public function Dosen()
    {
    	return $this->belongsTo('\App\Model\Ms\Dosen', 'id_dosen');
    }

    public function Kelas()
    {
        return $this->belongsTo('\App\Model\Rf\Kelas', 'id_kelas','id');
    }

    public function Matakuliah()
    {
        return $this->belongsTo('\App\Model\Rf\MataKuliah','id_mk');
    }


    public function getNamaAttribute()
    {
        return $this->matakuliah->nama." - ".$this->kelas->nama;
    }

    public function getTotalPertemuanAttribute($value='')
    {
        return $this->pertemuan->count();
    }
    public function getKehadiranAttribute()
    {
        return round($this->pertemuan->avg('kehadiran'),1);
    }
    public function getKehadiranMahasiswa($pertemuan, $id_mahasiswa, $ajar = null)
    {
        $persentase_berhalangan = .75;
        $kehadiran = 0;
        if($ajar){
            $total_pertemuan = $ajar->pertemuan->count();
            $daftar_pertemuan = $ajar->pertemuan;
        }else{
            $total_pertemuan = $pertemuan->ajar->pertemuan->count();
            $daftar_pertemuan = $pertemuan->ajar->pertemuan;
        }

        foreach ($daftar_pertemuan as $pertemuan) {
            $hadir = Absen::where('id_pertemuan', $pertemuan->id)
                                ->where('id_mahasiswa', $id_mahasiswa)
                                ->first();
            if($hadir){
                if($hadir->status == 1){
                    $kehadiran++;
                } else {
                    $kehadiran = $kehadiran+$persentase_berhalangan;
                }
            }

        }
        if($total_pertemuan == 0) $total_pertemuan = 1;
        return (round($kehadiran*100/$total_pertemuan));
    }

}
