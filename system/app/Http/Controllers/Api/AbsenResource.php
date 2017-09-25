<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Ms\User;
use App\Model\Tr\Absen;
use App\Model\Tr\Pertemuan;
use Illuminate\Http\Request;

class AbsenResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $result['status'] = 'error';
        $user = User::with('mahasiswa')->where('id_card', $req->id_card)->first();
        if(!$user or !$user->mahasiswa){
            $result['data'] = "Kartu Tidak Valid";
        }else{
            $pertemuan = Pertemuan::find($req->id_pertemuan);
            if($user->mahasiswa->id_kelas != $pertemuan->ajar->id_kelas){
                $result['data'] = "Kelas Tidak Sesuai";
            } else{
                $absen = Absen::where('id_pertemuan',$req->id_pertemuan)
                                    ->where('id_mahasiswa', $user->mahasiswa->id)->first();
                if($absen){
                    $result['data'] = "Mahasiswa Sudah Absen";
                }else {   
                    $absen = new Absen;
                    $absen->id_mahasiswa = $user->mahasiswa->id;
                    $absen->id_pertemuan = $req->id_pertemuan;
                    $absen->status = ($req->status) ? $req->status : 1;
                    $absen->save();
                    $result = $this->parsingResult($req->status, $user);
                    
                }
            }
        }
        return json_encode($result);
    }

    function parsingResult($status = null, $user){
        if($status){
            if ($status == 1) {
                $result['status'] = "success";
                $result['data'] = "Hadir";
            } else if ($status == 2) {
                $result['status'] = "warning";
                $result['data'] = "Sakit";
            } else {
                $result['status'] = "warning";
                $result['data'] = "Izin";
            }
        } else {
            $result['status'] = "success";
            $result['data'] = $user->mahasiswa->nama;
        }
        return $result;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $req, $id)
    {
        $absen = Absen::find($id);
        $absen->status = $req->status;
        $absen->save();
        switch ($req->status) {
            case 1:
                $result['status'] = 'success';
                $result['data'] = "Hadir";
                break;
            
            case 2:
                $result['status'] = 'warning';
                $result['data'] = "Sakit";
                break;
            
            case 3:
                $result['status'] = 'warning';
                $result['data'] = "Izin";
                break;

            case 0:
                $result['status'] = 'warning';
                $result['data'] = "Belum Hadir";
                $absen->delete();
                break;
            
            default:
                # code...
                break;
        }
        
        return json_encode($result);
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
