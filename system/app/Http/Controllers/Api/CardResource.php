<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Ms\User;
use App\Model\Tr\Ajar;
use Illuminate\Http\Request;

class CardResource extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $user = User::find($req->id_user);
        $user->id_card = $req->id_card;
        $user->save();
        return "true";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id_card', $id)->first();
        if($user){
            switch ($user->level) {
                case '1':
                    $result['tipe'] = 1;
                    $result['status'] = "success";
                    $result['data'] = $user->mahasiswa;
                    $result['msg'] = "Kartu Mahasiswa";
                    break;
                
                case '2':
                case '3':
                    
                    $result['tipe'] = 2;
                    $result['status'] = "success";
                    $result['data'] = $user->dosen;
                    $result['msg'] = "Kartu Dosen";
                    break;
                
                case '4':
                case '5':
                    
                    $result['tipe'] = 3;
                    $result['status'] = "success";
                    $result['data'] = $user;
                    $result['msg'] = "Kartu Admin";
                    break;
                
                default:
                    # code...
                    break;
            }
            
        }else{
            $ajar = Ajar::with('kelas', 'matakuliah', 'dosen')->where('id_card', $id)->first();
            if($ajar){

                    $result['tipe'] = 4;
                    $result['status'] = "success";
                    $result['data'] = $ajar;
                    $result['msg'] = "Kartu Mata Kuliah";
            }else{

                    $result['tipe'] = 0;
                    $result['status'] = "error";
                    $result['msg'] = "Kartu Tidak Ditemukan Didalam Sistem ";
            }
        }
        return json_encode($result);
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
        $user = User::find($req->id_user);
        if(!$user) return "User Tidak Ditemukan";
        $user->id_card = $req->id_card;
        $user->save();
        return "true";
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
