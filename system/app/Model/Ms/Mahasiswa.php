<?php

namespace App\Model\Ms;

use App\Model\Tr\Absen;
use App\Model\Tr\Pertemuan;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'ms_mahasiswa';

    public function User()
    {
        return $this->belongsTo('\App\Model\Ms\User', 'id_user');
    }

    public function Kelas()
    {
        return $this->belongsTo('\App\Model\Rf\Kelas', 'id_kelas');
    }
    
    public function Absen()
    {
        return $this->hasMany('\App\Model\Tr\Absen', 'id_mahasiswa');
    }

    public function getNamaKelasAttribute()
    {
        return $this->kelas->angkatan." ".$this->kelas->nama;
    }

}
