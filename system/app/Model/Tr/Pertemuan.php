<?php

namespace App\Model\Tr;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    protected $table = 'tr_pertemuan';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function Absen()
    {
        return $this->hasMany('\App\Model\Tr\Absen', 'id_pertemuan');
    }

    public function Tugas()
    {
        return $this->hasOne('\App\Model\Tr\Tugas', 'id_pertemuan');
    }

    public function Ajar()
    {
        return $this->belongsTo('\App\Model\Tr\Ajar', 'id_ajar', 'id');
    }

    public function getKehadiranAttribute()
    {
    	$absen = $this->absen->count();
    	$kelas = $this->ajar->kelas->mahasiswa->count();
    	if($kelas == 0) $kelas =1;
    	return round($absen/$kelas,2)*100;
    }

    public function getJamKeAttribute()
    {
        $jam = $this->created_at->format("H");
        $menit = $this->created_at->format("i");

        switch ($jam) {
            case '14':
                if ($menit > 45) {
                    return "2";
                } else {
                    return "1";
                }
                
                break;
            
            case '15':
                return "3";
                break;
            
            case '16':
                return "4";
                break;
            
            case '17':
                return "5";
                break;
            
            case '18':
                return "6";
                break;
            
            case '19':
                return "7";
                break;
            
            case '20':
                return "8";
                break;
            
            default:
                # code...
                break;
        }
    }
}
