<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Tr\Ajar;
use App\Model\Tr\Pertemuan;
use Illuminate\Http\Request;

class PertemuanResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "hehe";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $id_card = $req->id_card;
        $ajar = Ajar::where('id_card',$id_card)->first();
        if($ajar){
            $total_pertemuan = Pertemuan::all();
            $jumlah_pertemuan = Pertemuan::where('id_ajar', $ajar->id)->count();
            $pertemuan = new Pertemuan;
            $pertemuan->id_ajar = $ajar->id;
            $pertemuan->materi = "";
            $pertemuan->pertemuan_no = $jumlah_pertemuan+1;
            $pertemuan->save();
            $msg = $ajar->matakuliah->nama." - ".$ajar->kelas->nama."\nPertemuan Ke-".$pertemuan->pertemuan_no;
            $res = [
                'status'    => "success",
                'msg'       => $msg,
                'url'       => "/".$pertemuan->id
            ];
        } else {
            $res = [
                'status'    => "error",
                'msg'       => "Kelas Tidak Ditemukan",
                'url'       => ""
            ];
        }
        return json_encode($res);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertemuan = 
        Pertemuan::with(
                    'ajar',
                    'ajar.kelas',
                    'ajar.kelas.mahasiswa',
                    'ajar.kelas.mahasiswa.user',
                    'absen',
                    'absen.mahasiswa',
                    'absen.mahasiswa.user'
                    )->find($id);
        if(!$pertemuan) abort(404);
        $absen_hadir_array = $pertemuan->absen->pluck('id_mahasiswa')->toArray();
        $mahasiswa_belum_hadir = $pertemuan
                                ->ajar
                                ->kelas
                                ->mahasiswa
                                ->whereNotIn('id', $absen_hadir_array)
                                ->values();
        foreach ($mahasiswa_belum_hadir as $key => $value) {
            $value->kehadiran = $pertemuan->ajar->getKehadiranMahasiswa($pertemuan, $value->id);
        }

        $absen_mahasiswa_berhalangan_hadir = $pertemuan->absen->where('status','<>', 1)->values();
        foreach ($absen_mahasiswa_berhalangan_hadir as $key => $value) {
            $value->mahasiswa->kehadiran = $pertemuan->ajar->getKehadiranMahasiswa($pertemuan, $value->mahasiswa->id);
        }

        $absen_mahasiswa_hadir = $pertemuan->absen->where('status', 1)->values();
        foreach ($absen_mahasiswa_hadir as $key => $value) {
            $value->mahasiswa->kehadiran = $pertemuan->ajar->getKehadiranMahasiswa($pertemuan, $value->mahasiswa->id);
        }
        
        $data['mahasiswa_belum_hadir'] = $mahasiswa_belum_hadir;
        $data['absen_mahasiswa_berhalangan_hadir'] = $absen_mahasiswa_berhalangan_hadir;
        $data['absen_mahasiswa_hadir'] = $absen_mahasiswa_hadir;
        $data['absen_mahasiswa_hadir_daftar'] = $absen_mahasiswa_hadir->sortByDesc('id')->take(5)->values();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
