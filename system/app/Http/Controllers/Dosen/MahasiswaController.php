<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Model\Ms\Absen;
use App\Model\Ms\Mahasiswa;
use App\Model\Rf\Kelas;
use App\Model\Tr\Ajar;
use App\Model\Tr\Pertemuan;
use App\User;
use Auth;
use Illuminate\Http\Request;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['daftar_ajar'] = Auth::user()->dosen->ajar;
        return view('dosen.mahasiswa.index',$data);
    }

    public function cardRegister($id_kelas = null)
    {
        $data['daftar_ajar'] = Auth::user()->dosen->ajar;
        if($id_kelas){
            $data['mahasiswa'] = $mahasiswa = Kelas::with('mahasiswa', 'mahasiswa.user')->find($id_kelas)->mahasiswa;
            $data['mahasiswa_belum'] = $mahasiswa->pluck('user')->where('id_card',null)->slice(1,5)->values();
            $mahasiswa_belum_set = $mahasiswa->pluck('user')->where('id_card', null)->first();
            if($mahasiswa_belum_set) $data['mahasiswa_belum_set'] = $mahasiswa->pluck('user')->where('id_card', null)->first()->mahasiswa;
        }
        return view('dosen.mahasiswa.card-register',$data);

    }

}
