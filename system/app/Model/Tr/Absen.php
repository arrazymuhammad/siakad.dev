<?php

namespace App\Model\Tr;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'tr_absen';

    public function Pertemuan()
    {
    	return $this->belongsTo('\App\Model\Tr\Pertemuan', 'id_pertemuan');
    }

    public function Mahasiswa()
    {
    	return $this->belongsTo('\App\Model\Ms\Mahasiswa', 'id_mahasiswa');
    }
}
