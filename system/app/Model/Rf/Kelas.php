<?php

namespace App\Model\Rf;

use App\Model\Rf\TahunAjar;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'rf_kelas';


    public function Angkatan()
    {
        return $this->belongsTo('\App\Model\Rf\Angkatan', 'id_angkatan');
    }

    public function Mahasiswa()
    {
    	return $this->hasMany('\App\Model\Ms\Mahasiswa', 'id_kelas');
    }

	public function Pertemuan()
    {
    	return $this->hasMany('\App\Model\Tr\Pertemuan', 'id', 'id_kelas');
    }

    public function getSemesterAttribute()
    {
        $tahun_ajar = TahunAjar::where('status',1)->first();
        $tahun = $tahun_ajar->tahun - $this->angkatan;
        $semester = ($tahun*2) + $tahun_ajar->semester;
        return $semester;
    }

}
