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
use Carbon\Carbon;
class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['ajar'] = $ajar = Ajar::with( 'kelas', 
                                    'matakuliah',
                                    'pertemuan',
                                    'pertemuan.ajar',
                                    'pertemuan.ajar.kelas',
                                    'pertemuan.ajar.matakuliah'
                                )
                            ->where('id_tahun_ajar', $this->getTahunAjar()->id)
                            ->where('id_dosen', Auth::user()->dosen->id)
                            ->get();
        return view('dosen.absen.index', $data);
    }

    public function show($id_pertemuan)
    {
        Carbon::setLocale('id');
        $data['pertemuan'] = $pertemuan = Pertemuan::find($id_pertemuan);
        if(!$pertemuan) abort(404);
        return view('dosen.absen.show', $data);
    }

    public function store(Request $req)
    {
        $pertemuan = Pertemuan::find($req->id_pertemuan);
        $pertemuan->materi = $req->materi;
        $pertemuan->save();
        return redirect()->back();
    }

}
